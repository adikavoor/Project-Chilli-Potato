from flask import render_template, flash, redirect, session, url_for, request, g
from app import app , db
from models import Band
from  sqlalchemy.sql.expression import func, select

loggedIn = False
@app.route('/')
@app.route('/index')
def index():
	try:
		bands = Band.query.order_by(func.random()).limit(8)
	except:
		return redirect(url_for('bandForm'))
	return render_template('index.html' , title='Home' , bands = bands)

@app.route('/search')
def search():
	#Attempt the query
	query=request.args.get('find')
	origQuery = query
	if query == None:
		return "Nothing to search for"
	#Remove extra spaces
	query=" ".join(query.split())
	#Replace space with %
	query="%"+query.replace(" ","%")+"%"
	print query
	try:
		bands = bands = Band.query.filter(Band.title.like(query)).all()
	except:
		bands = None
	#If query doesn't return data; Say no data!
	if bands:
		return render_template('bandList.html' , title='Home' , bands = bands, query = origQuery)
	else:
		return "No data"

@app.route('/login', methods=['GET', 'POST'])
def login():
    error = None
    if request.method == 'POST':
        if request.form['username'] != "admin" or  request.form['password'] != "admin":
            error = 'Invalid username/password'
        else:
            session['logged_in'] = True
            #flash('You were logged in')
            return redirect(url_for('bandForm'))
    return render_template('login.html', error=error)


@app.route('/logout')
def logout():
    session.pop('logged_in', None)
    #flash('You were logged out')
    return redirect(url_for('index'))

@app.route('/list')
def list():
	try:
		bands = Band.query.all()
	except:
		bands = None
	#If query doesn't return data; Say no data!
	if bands:
		return render_template('bandList.html' , title='Home' , bands = bands)
	else:
		return "No data"

@app.route('/band/<idNo>')
def bands(idNo):
	#Attempt the query
	try:
		band = Band.query.filter_by(id=idNo).first()
	except:
		band = None
	#Process Members before posting to the page
	if band:
		return render_template('bandPage.html' , title=band.title , band = band)
	else:
		return "No Data"

@app.route('/bandForm', methods=['POST', 'GET'])
def bandForm():
	if not session.get('logged_in'):
		return redirect(url_for('login'))
	if request.method == 'GET':
		return render_template('bandForm.html')
	elif request.method == 'POST':
		title = request.form['title']
		img = request.form['img']
		bio = request.form['bio']
		band_mem = request.form['band_mem']
		year = request.form['year']
		origin = request.form['origin']
		label = request.form['label']
		genre = request.form['genre']
		manager = request.form['manager']
		website = request.form['website']
		facebook = request.form['facebook']
		twitter = request.form['twitter']
		youtube = request.form['youtube']
		soundcloud = request.form['soundcloud']
		
		newBand = Band(title, img, bio, band_mem, year, origin, label, genre, manager, website, facebook, twitter, youtube, soundcloud)
		db.session.add(newBand)
		db.session.commit()
		#After Adding the new band; Go to it's page.
		try:
			band = Band.query.filter_by(title=title).first()
		except:
			band = None
		if band:
			return render_template('bandPage.html' , title=band.title , band = band)
		else:
			return "No Data"


