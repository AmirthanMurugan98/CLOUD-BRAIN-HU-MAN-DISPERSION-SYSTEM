if request.method=='POST':
 name=request.form['name']
 relation=request.form['relation']
 mobile=request.form['mobile']
 email=request.form['email']
rn=randint(100,999) 
mycursor.execute("SELECT max(id)+1 FROM vb_relative")
maxid = mycursor.fetchone()[0]
 if maxid is None:
maxid=1
pw=str(maxid)+str(rn)
 pw1=obj.encrypt(pw) 
 now = date.today() 
rdate=now.strftime("%d-%m-%Y")
 rdate1=obj.encrypt(rdate)
 if name=="":
 name1=""
 else:
53
 name1=obj.encrypt(name)
 if relation=="":
 relation1=""
 else:
 relation1=obj.encrypt(relation)
 if mobile=="":
 mobile1=""
 else:
 mobile1=mobile
 if email=="":
 email1=""
 else:
 email1=obj.encrypt(email)
sql = "INSERT INTO 
vb_relative(id,uname,name,relation,mobile,email,pass,rdate) VALUES 
(%s,%s,%s,%s,%s,%s,%s,%s)"
val = (maxid,uname,name1,relation1,mobile1,email1,pw1,rdate1)
mycursor.execute(sql, val)
mydb.commit()