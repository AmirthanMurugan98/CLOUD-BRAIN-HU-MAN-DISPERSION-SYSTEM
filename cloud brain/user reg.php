fname1=obj.encrypt(fname)
51
 lname1=obj.encrypt(lname)
 gender1=obj.encrypt(gender)
 dob1=obj.encrypt(dob)
 address1=obj.encrypt(address)
 address21=obj.encrypt(address2)
 pincode1=obj.encrypt(pincode)
 city1=obj.encrypt(city)
 state1=obj.encrypt(state)
 country1=obj.encrypt(country)
 email1=obj.encrypt(email)
 mobile1=obj.encrypt(mobile)
 mobile21=obj.encrypt(mobile2)
 landline1=obj.encrypt(landline)
 adhar1=obj.encrypt(adhar)
 voter1=obj.encrypt(voter)
 pancard1=obj.encrypt(pancard)
 driving1=obj.encrypt(driving)
 pass11=obj.encrypt(pass1)
 rdate1=obj.encrypt(rdate) 
mycursor.execute("SELECT count(*) FROM vb_register where 
uname=%s",(uname,))
myresult = mycursor.fetchone()[0]
 if myresult==0:
mycursor.execute("SELECT max(id)+1 FROM vb_register")
maxid = mycursor.fetchone()[0]
 if maxid is None:
maxid=1
sql = "INSERT INTO 
vb_register(id,fname,lname,gender,dob,address,address2,pincode,city,state,coun
52
try,email,mobile,mobile2,landline,adhar,voter,pancard,driving,uname,pass,rdate
) VALUES 
(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%
s)"
val = 
(maxid,fname1,lname1,gender1,dob1,address1,address21,pincode1,city1,state1,
country1,email1,mobile1,mobile21,landline1,adhar1,voter1,pancard1,driving1,u
name,pass11,rdate1)
mycursor.execute(sql, val)
mydb.commit()