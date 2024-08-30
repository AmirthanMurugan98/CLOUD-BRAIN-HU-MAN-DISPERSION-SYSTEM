defsend_alert():
msg=""
 days=0
mycursor = mydb.cursor()
mycursor.execute("SELECT * FROM vb_register")
rr = mycursor.fetchall()
if days>=45:
 if st==3:
 a=""
54
 else:
ss="1"
mycursor.execute("update vb_register set status=3 where uname=%s",(un,))
mydb.commit()
 mess="User("+un+") has does not access the application in last 45 
days, update the status of the user or access the account"
mycursor.execute("SELECT * FROM vb_user where uname=%s",(un,))
 d1 = mycursor.fetchone()
 email=obj.decrypt(d1[4].encode("utf-8"))
 print(mess)
 print(email)
elif days>=30:
 if st==2:
 a=""
 else:
ss="1"
mycursor.execute("update vb_register set status=2 where uname=%s",(un,))
mydb.commit()
 mess="Dear "+un+", From:Cloud Brain, You are not access your 
account in last 30 days, so you want to access your account"
 print(mess)
 print(email)
elif days>=15:
 if st==1:
 a=""
 else:
ss="1"
mycursor.execute("update vb_register set status=1 where uname=%s",(un,))
mydb.commit()
55
 mess="Dear "+un+", From:Cloud Brain, You are not access your 
account in last 15 days, so you want to access your account"
Information Send to Mail
mycursor = mydb.cursor()
mycursor.execute("SELECT * FROM vb_register where uname=%s",(uname, 
))
dat = mycursor.fetchone()
 data=[]
data.append(dat[0])
data.append(obj.decrypt(dat[1].encode("utf-8")))
data.append(obj.decrypt(dat[2].encode("utf-8")))
 active=dat[43]
 if active==1:
act_st="1"
 else:
act_st="2"
 if dat[33]=="":
data.append("")
 else:
data.append(obj.decrypt(dat[33].encode("utf-8")))
 if act=="yes":
mycursor.execute("update vb_register set alert_st=0 where 
uname=%s",(uname,))
mydb.commit()
 return redirect(url_for('setting'))
 if act=="no":
mycursor.execute("update vb_register set alert_st=1 where 
uname=%s",(uname,))
mydb.commit()
56
 return redirect(url_for('setting'))
 if act=="died":
msg="sent2"
mycursor.execute("update vb_register set active_st=1 where 
uname=%s",(uname,))
mydb.commit()
mycursor.execute("SELECT * FROM vb_relative where uname=%s",(uname, 
))
 dat2 = mycursor.fetchall()
 for dd2 in dat2:
 rid=dd2[0]
rname=obj.decrypt(dd2[2].encode("utf-8"))
 mob1=dd2[4]
 email1=obj.decrypt(dd2[5].encode("utf-8"))
 p1=obj.decrypt(dd2[6].encode("utf-8"))
 kk1=randint(100,500)
 kk2=randint(500,950)
kk=str(kk1)+str(kk2)
mycursor.execute("update vb_relative set secret_key=%s where 
id=%s",(kk,rid))
mydb.commit()
dt=[]
 mess1="Dear "+rname+", Received information from "+uname+", 
Username:"+mob1+", Password:"+p1+", Key: "+kk+", Link: 
http://localhost:5000/login";
 print(mess1)
 print(email1)
dt.append(mess1)
dt.append(email1)
57
 data2.append(dt)
 if act=="sendmail":
msg="sent"
mycursor.execute("SELECT * FROM vb_relative where uname=%s",(uname, 
))
 dat2 = mycursor.fetchall()
 for dd2 in dat2:
 rid=dd2[0]
rname=obj.decrypt(dd2[2].encode("utf-8"))
 mob1=dd2[4]
 email1=obj.decrypt(dd2[5].encode("utf-8"))
 p1=obj.decrypt(dd2[6].encode("utf-8"))
 kk1=randint(100,500)
 kk2=randint(500,950)
kk=str(kk1)+str(kk2)
mycursor.execute("update vb_relative set secret_key=%s where 
id=%s",(kk,rid))
mydb.commit()
dt=[]
 mess1="Dear "+rname+", Received information from "+uname+", 
Username:"+mob1+", Password:"+p1+", Key: "+kk+", Link: 
http://localhost:5000/login";
Decrypt Information
obj=AESCipher(ky)
rname=obj.decrypt(rr[2].encode("utf-8"))
mycursor.execute("SELECT count(*) FROM vb_register where uname=%s && 
rid=%s",(un,rid ))
 cnt1 = mycursor.fetchone()[0]
 if cnt1>0:
58
 st1="1"
mycursor.execute("SELECT * FROM vb_register where uname=%s && 
rid=%s",(un,rid ))
dat = mycursor.fetchone()
data.append(dat[0])
data.append(obj.decrypt(dat[1].encode("utf-8")))
data.append(obj.decrypt(dat[2].encode("utf-8")))
data.append(obj.decrypt(dat[3].encode("utf-8")))
data.append(obj.decrypt(dat[4].encode("utf-8")))
mycursor.execute("SELECT count(*) FROM vb_document where uname=%s 
&& rid=%s",(un,rid ))
 cnt5 = mycursor.fetchone()[0]
 if cnt5>0: