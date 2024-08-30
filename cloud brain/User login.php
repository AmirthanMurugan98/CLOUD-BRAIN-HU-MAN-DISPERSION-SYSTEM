deflogin():
 act=""
msg=""
mycursor = mydb.cursor() 
 if request.method == 'POST':
 username1 = request.form['uname']
 password1 = request.form['pass'] 
mycursor.execute("SELECT count(*) FROM vb_relative where 
mobile=%s",(username1,))
myresult = mycursor.fetchone()[0] 
 if myresult>0:
mycursor.execute("SELECT * FROM vb_relative where 
mobile=%s",(username1,))
rr = mycursor.fetchone()
ky=rr[1]
obj=AESCipher(ky) 
50
pw=obj.decrypt(rr[6].encode("utf-8"))
 if pw==password1:
 session['username'] = username1 
 session['rid'] = rr[0]
 return redirect(url_for('home'))
 else: 
msg="Invalid Username or Password!