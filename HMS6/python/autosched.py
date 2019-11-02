"""
ICS 499 - Hotel Management Software
Group 4 - Riley, Elvir, Abdalla

Autoscheduler

Note:       This depends on pymysql, which can be installed with PIP,
            and random, which should be standard.

Warning:    This code is untested. It is not ready for inclusion.
"""

import pymysql
from random import shuffle

"In case DB commands change, they're all listed here."
#define SCHED_CMD "select * from schedule order by Room asc;"
#define EMPL_CMD "select distinct Employee from schedule;"
#define NEED_CLEAN "Un-Cleaned"
#define ROOM_AVAIL "Make Up My Room"

class User:
    """Not sure whether to implement in Py or consider them implemented in php,
    for now it's a placeholder."""
    def __init__(self, fname, lname):
        self.fname = fname
        self.lname = lname

    def verifyPassword():
        "TODO"

    def login():
        "TODO"

    def logout():
        "TODO"

class Manager(User):
    def createAccount():
        "TODO"
    def deleteAccount():
        "TODO"
    def modifyAccount():
        "TODO"
    def addRoom():
        "TODO"
    def removeRoom():
        "TODO"
    def modifyRoom():
        "TODO"

class Employee(User):
    def exportSchedule():
        "TODO"

class Room:
    def __init__(self, roomNumber, floorNumber, roomStatus, roomAlert)
        self.roomNumber = roomNumber
        self.floorNumber = floorNumber
        self.roomStatus = roomStatus
        self.roomAlert = roomAlert

class DBInterface:
    def __init__(self, dbAddr, dbName, dbUser, dbPwd):
        "Connect to a MySQL server"
        cnx = pymysql.connect(dbAddr, dbUser, dbPwd, dbName)
        "Prepare a pointer to a DB"
        sql = cnx.cursor()

    def __del__():
        cnx.close()
        sql = None

    def getSched():
        "Get all rooms"
        cur.execute(SCHED_CMD)

        "Prepare a list of Rooms from data"
        ret = []
        for row in cur.fetchall():
            ret.append(Room("Room#" row[1], "Floor#" row[0],
                            "Room Status" row[5], "Alerts" row[4]))
        
        return ret

    def getEmployees():
        cur.execute(EMPL_CMD)

        ret = []
        for row in cur.fetchall():
            ret.append(row[0])

    def saveSchedToDB(sched):
        "TODO"


class AutoScheduler:
    def __init__(self):
        self.db = DBInterface("localhost", "hms", "root", "")
        self.empl = db.getEmployees
        self.rooms = getNeedyRooms

    def getNeedyRooms():
        ret = []

        "Find and return a list of all rooms elligible for cleaning"
        for room in db.getSched():
            if room.roomStatus.casefold() == NEED_CLEAN.casefold():
                if room.roomAlert.casefold() == ROOM_AVAIL.casefold() or room.roomAlert == "":
                    ret.append(room)

        return ret 

    def assignRooms():
        numEmpl = empl.len()
        numRooms = room.len()
        ret = []

        "Work may not be totally even, so shuffle the employees"
        shuffle(empl)

        extraRooms = numRooms % numEmpl

        counter = 0

        "Divvy up all rooms roughly evenly and grouped by floor"
        for i in range(numEmpl):
            buf = []
            for j in range(numRooms // numEmpl):
                buf.append(rooms[counter])
                counter += 1
            if extraRooms > 0:
                buf.append(rooms[counter])
                counter += 1
                extraRooms -= 1
            ret.append(buf)

        return ret
