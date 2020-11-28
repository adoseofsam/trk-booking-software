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
customer_csv = "customer.csv"
customer_sql = "customer.sql"
owner_sql ='owner.sql'
eid = 0
cid = 0
emp_count = 10 #number of users 
cus_count = 120 #number of customers
addresses = ['9602 Roehampton Ave. Forney TX 75126' , '136 W. Southampton Lane Shakopee MN 55379', '615 Border Dr.Grayslake IL 60030', '935 W. Depot St.Fort Wayne IN 46804','14a Lady Musgrave Rd Kingston 5', ' 16 Tangerine Pl Kingston 10', '22 Little Premier Plaza Kingston 10'
              'Gordon Town Road Kingston 6', '52 Grenada Cres Kingston 5' , '21 Mannings Hill Rd Kingston 8' , '29 Passagefort Dr Portmore', ' 2 Trafford Pl Kingston 5', '1a Gretna Green Ave Kingston 11','30 Knutsford Blvd','30 Knutsford Blvd']

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
    uid = "TRE" + str(eid)
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


def customerDesign():
    global cid
    cusid = "TRC" + str(cid)
    cid += 1
    if gender == 'M':
        fname = faker.first_name_male()
    else:
        fname = faker.first_name_female()
    lname = faker.last_name()
    address = choice(addresses)
    email = faker.email()
    phone = faker.phone_number()
    return listocsv([cusid,fname,address,email,phone])

    
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


def writecustomer(cusdata):
    file = open(customer_csv, "w",encoding='utf-8')
    for i in range (cus_count):
        file.write(cusdata[i] + "\n")
    file.close()

def cusdata():                  
    lst=[]
    for s in range(cus_count):
        lst.append(customerDesign())
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

def customersql():
    File = open(customer_csv, "r")
    readd = File.readlines()
    header = 'INSERT INTO User \n VALUES\n'
    for i in range (len(readd)-1):
       header += '\t'+ '('+readd[i].strip()+ ')' + ',' +'\n'
    header += '\t'+ '('+readd[-1].strip()+ ')' + ';'
    File.close()
    f = open(customer_sql, "w",encoding='utf-8')
    f.write(header)
    f.close()

def ownersql():
    file = open(owner_sql,"w",encoding='utf-8')
    file.write("insert into Owner values('TRO00', 'Robert Reid');")
    file.close()


writedata(gendata())
preparesql() 
writecustomer(cusdata())
customersql()
ownersql()

