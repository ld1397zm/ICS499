"""
ICS 499 - Hotel Management System
Riley, Elvir, Abdalla

Automatic Cleaning Schedule program
Note: This program depends on pymysql, which may be installed through PIP.
"""

import pymysql
from random import shuffle

"In case DB commands change, they're all listed here."
SCHED_CMD = "select * from schedule order by Room asc;"
EMPL_CMD = "select distinct Employee from schedule where Employee is not null ;"
CREATE_AUTOSCHEDULE = "create table autoschedule (Floor INT, Room INT, Employee VARCHAR(64));"
DELETE_AUTOSCHEDULE = "drop table autoschedule;"
NEED_CLEAN = "Un-Cleaned"
ROOM_AVAIL = "Make Up My Room"


class Room:
    """A room is identified by position and status"""
    def __init__(self, roomNumber, floorNumber, roomStatus, roomAlert):
        self.roomNumber = roomNumber
        self.floorNumber = floorNumber
        self.roomStatus = roomStatus
        self.roomAlert = roomAlert


class DBInterface:
    def __init__(self, dbAddr, dbName, dbUser, dbPwd):
        """Connect to a MySQL server"""
        self.cnx = pymysql.connect(dbAddr, dbUser, dbPwd, dbName)
        """Prepare a pointer to a DB"""
        self.sql = self.cnx.cursor()

    def __del__(self):
        """Close the connection at the end"""
        self.cnx.close()
        sql = None

    def get_rooms(self):
        """Get all rooms"""
        self.sql.execute(SCHED_CMD)

        """Prepare a list of Rooms from data"""
        ret = []
        for row in self.sql.fetchall():
            ret.append(Room(row[1], row[0], row[5], row[4]))

        return ret

    def get_employees(self):
        """Get a distinct list of employees"""
        self.sql.execute(EMPL_CMD)

        ret = []
        """Format employee list"""
        for row in self.sql.fetchall():
            ret.append(row[0])

        return ret

    def reset_autosched_table(self):
        tables = []
        """Get and format a list of tables"""
        self.sql.execute("show tables")
        for i in self.sql:
            tables.append(i[0])

        """Reset autoschedule table to empty state"""
        if 'autoschedule' in tables:
            self.sql.execute(DELETE_AUTOSCHEDULE)
        self.sql.execute(CREATE_AUTOSCHEDULE)

    def save_sched_to_db(self, sched, names):
        self.reset_autosched_table()

        """commit = []"""

        """Format a sql query to add row, then execute"""
        for i in range(len(names)):
            for j in sched[i]:
                """commit.append([j.floorNumber, j.roomNumber, names[i]])"""
                self.sql.execute("insert into autoschedule values (" + j.floorNumber + ", " + j.roomNumber + ", '" + names[i] + "');")

        """Ensure changes are reflected in DB"""
        self.cnx.commit()

class AutoScheduler:
    def __init__(self):
        self.db = DBInterface("localhost", "hms", "root", "")
        self.empl = self.db.get_employees()
        self.rooms = self.get_needy_rooms()

    def get_needy_rooms(self):
        ret = []

        """Find and return a list of all rooms eligible for cleaning"""
        for room in self.db.get_rooms():
            if room.roomStatus.casefold() == NEED_CLEAN.casefold():
                if room.roomAlert.casefold() == ROOM_AVAIL.casefold() or \
                        room.roomAlert == "":
                    ret.append(room)

        return ret

    def assign_rooms(self):
        numEmpl = len(self.empl)
        numRooms = len(self.rooms)
        ret = []

        extraRooms = numRooms % numEmpl

        counter = 0

        """Divvy up all rooms roughly evenly and grouped by floor"""
        for i in range(numEmpl):
            buf = []
            for j in range(numRooms // numEmpl):
                buf.append(self.rooms[counter])
                counter += 1
            if extraRooms > 0:
                buf.append(self.rooms[counter])
                counter += 1
                extraRooms -= 1
            ret.append(buf)

        """Not all work is even - distribute extra rooms equitably"""
        shuffle(ret)

        return ret

    def save_sched_to_db(self):
        self.db.save_sched_to_db(self.assign_rooms(), self.empl)
