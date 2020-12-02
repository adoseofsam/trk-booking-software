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
year = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22']
salary = ['8000','8500','9000','9500','10000','10500','11000','11500']
gender_num = len(gender) 
equipmentList =["Tent","Chairs","Bounce House", "Party Hats" ]
employee_csv = "employee.csv"                
employee_sql = "employee.sql"
customer_csv = "customer.csv"
customer_sql = "customer.sql"
owner_sql ='owner.sql'
account_csv = "account.csv"
account_sql = "account.sql"
equip_sql ="equip.sql"
equip_csv ="equip.csv"
eid = 1
cid = 0
aid = 0
eqid = 0
eq_count = 15
emp_count = 10 #number of users 
cus_count = 120 #number of customers
account_count = 11
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

def equipment():
    """ gen equipment. handle reverse equip with a trigger or stored procedure in database. """
    ecount = 3 #number of equipment each customer can rent for eg
    ucount = 200 #number of customers to give equipment to

    equipment = {} #storing r/ship between customer and equip
    for i in range(1,ucount+1):
        eid = "EQ" + str(i)
        equipment[eid] = ["TRC" + str(x) for x in range(i+1,i+1+ecount)]
    
    # flist = list(groupss.items())
    # flist.sort(key=lambda x: int(x[0][2:]))
    # pprint.pprint(flist)

    return equipment



# def equipmentDesign():
#     global eqid
#     global cid
#     ed = "EQ" + str(eqid)
#     ci = "TRC" + str(cid)
#     eqid += 1
#     cid +=1
#     equip_name = choice(equipmentList)
#     equip_quan = choice(year)
#     date = faker.date()
#     return listocsv([ed,ci,equip_name,equip_quan,date])

def accountDesign():
    global aid
    uid = "TRE" + str(aid)
    owner = "TRE0"
    aid += 1
    if uid == owner:
        position = "Owner"
        fname = "Robert"
        lname ="Reid"
    else:
        position ="Employee"
        if gender == 'M':
            fname = faker.first_name_male()
            lname =  faker.last_name()
        else:
            fname = faker.first_name()
            lname =  faker.last_name()
    address =  choice(addresses)
    years = choice(year)
    salar = choice(salary)
    return listocsv([uid, fname , lname ,address, years , position , salar]) 




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
    address = choice(addresses)
    phone = faker.phone_number()
    email = faker.email()
    return listocsv([uid, fname , lname , dob,address, phone , genders , email]) 


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
    return listocsv([cusid,fname,lname,address,email,phone])

def genaccount():
    lst=[]
    for s in range(account_count):
        lst.append(accountDesign())
    return lst

def writeaccount(genaccount):                 
    file = open(account_csv, "w",encoding='utf-8')
    for i in range (account_count):
        file.write(genaccount[i] + "\n")
    file.close()


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


def eqToCsv():
    f = open(equip_csv, "w")
    for key, val in equipm.items():
        for v in val:
            f.write(f" '{key}','{v}','{choice(equipmentList)}','{choice(year)}','{faker.date()}'\n")
    f.close()


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
    header = 'INSERT INTO Employee \n VALUES\n'
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
    header = 'INSERT INTO Customer \n VALUES\n'
    for i in range (len(readd)-1):
       header += '\t'+ '('+readd[i].strip()+ ')' + ',' +'\n'
    header += '\t'+ '('+readd[-1].strip()+ ')' + ';'
    File.close()
    f = open(customer_sql, "w",encoding='utf-8')
    f.write(header)
    f.close()

def equipsql():
    File = open(equip_csv, "r")
    readd = File.readlines()
    header = 'INSERT INTO Equipment \n VALUES\n'
    for i in range (len(readd)-1):
       header += '\t'+ '('+readd[i].strip()+ ')' + ',' +'\n'
    header += '\t'+ '('+readd[-1].strip()+ ')' + ';'
    File.close()
    f = open(equip_sql, "w",encoding='utf-8')
    f.write(header)
    f.close()

def accountsql():
    File = open(account_csv, "r")
    readd = File.readlines()
    header = 'INSERT INTO Account \n VALUES\n'
    for i in range (len(readd)-1):
       header += '\t'+ '('+readd[i].strip()+ ')' + ',' +'\n'
    header += '\t'+ '('+readd[-1].strip()+ ')' + ';'
    File.close()
    f = open(account_sql, "w",encoding='utf-8')
    f.write(header)
    f.close()

def ownersql():
    file = open(owner_sql,"w",encoding='utf-8')
    file.write("insert into Owner values('TRE0', 'Robert Reid');")
    file.close()


equipm = equipment()
eqToCsv()
equipsql()
writedata(gendata())
preparesql() 
writecustomer(cusdata())
customersql()
ownersql()
writeaccount(genaccount())
accountsql()