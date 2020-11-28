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
emp_count = 10 #number of users 

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
    uid = "TR" + str(eid)
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
    return listocsv([uid, fname , lname , dob, phone , genders , email]) 



def writedata(gendata):                 
    file = open(employee_csv, "w",encoding='utf-8')
    for i in range (emp_count):
        file.write(gendata[i] + "\n")
    file.close()

def gendata():                  
    lst=[]
    for s in range(emp_count):
        lst.append(employeeDesign())
    return lst

def preparesql():
    File = open(employee_csv, "r")
    readd = File.readlines()
    header = 'INSERT INTO User \n VALUES\n'
    for i in range (len(readd)-1):
       header += '\t'+ '('+readd[i].strip()+ ')' + ',' +'\n'
    header += '\t'+ '('+readd[-1].strip()+ ')' + ';'
    File.close()
    f = open(employee_sql, "w",encoding='utf-8')
    f.write(header)
    f.close()


writedata(gendata())
preparesql() 

