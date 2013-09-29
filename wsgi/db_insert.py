from flask import Flask
from flask.ext.sqlalchemy import SQLAlchemy
from app.models import Band

app = Flask(__name__)
app.config.from_object('config')

db = SQLAlchemy(app)

db.create_all()
bands = [ ["Inner Sanctum","Metal"]] #["Lagori","Rock"] ,
for band in bands:
  newBand = Band(band[0],band[1])
  db.session.add(newBand)
db.session.commit()
