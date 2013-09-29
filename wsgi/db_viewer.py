from flask import Flask
from flask.ext.sqlalchemy import SQLAlchemy
from app.models import Band

app = Flask(__name__)
app.config.from_object('config')

db = SQLAlchemy(app)

bands = Band.query.filter(Band.title.like("%live%")).all()



for band in bands:
	print band.title
