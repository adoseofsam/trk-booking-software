"""PYTHON FILE USED TO GENERATE TEST DATA FOR DATABASE"""
"""GENERATE CSV FILES WITH DATA, CREATE RESPECTIVE SQLS AND POPULATE DATABASE"""

from faker import Faker
from random import randint
from random import choice
import random, pprint
 
 ######################################
"""     GLOBAL VARIABLES   """                                  
faker = Faker()  
gender = ['M' , 'F']  
gender_num = len(gender) 
employee_csv = "employee.csv"
employee_sql = "employee.sql"
eid = 0
numofEmployee = 10

#add quotations on each element in a list
def addquote(string): 
    return "\'"+string+"\'"

def removequote(string):
    return string.replace("'", "")

#function to join values
def listocsv(lis, quotify=True):               
    if quotify: 
        return ",".join(list(map(addquote,lis)))
    return ",".join(lis)


def employeeDesign():
    global eid
    employee_id = "TR" + str(eid)
    eid += 1
    global gender
    genders = gender[randint(0, gender_num-1)]
    if gender == 'M':
        fname = faker.first_name_male()
    else:
        fname = faker.first_name_female()
    lname = faker.last_name()
    dob = faker.date()
    phone = faker.phone_number()
    email = faker.email()
    address = faker.address()
    return listocsv([employee_id, fname,lname,address,dob,phone,email])


def employeeGen():
    lst = []
    for i in range(numofEmployee):
        lst.append(employeeDesign)
    return lst

def employeeCSV(employeeGen):
    file = open(employee_csv,"w",encoding='utf-8')
    for i in range(len(employeenum)):
        file.write(employeenum[i]+"\n")
    file.close()

def employeeSql():
    e_file = open(employee_csv, "r")
    e_read = e_file.readlines()
    header = 'INSERT INTO Employee \n VALUES \n'
    for i in range(len(e_read)-1):
        header += '\t'+'('+e_read[i].strip()+ ')' + ',' +'\n'
    header += '\t'+'('+e_read[-1].strip()+ ')' + ';'
    e_file.close()
    empf = open(employee_sql,"w",encoding='utf-8')
    empf.write(header)
    empf.close

employeenum = employeeDesign()
employeeCSV(employeeGen())
employeeSql()

