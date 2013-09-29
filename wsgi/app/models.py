from app import db

class Band(db.Model):
    __tablename__ = 'bands'
    id = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(100), unique=True, nullable=False)
    img = db.Column(db.String(50), unique=False)
    bio = db.Column(db.String(5000), unique=False)
    band_mem = db.Column(db.String(5000), unique=False)
    year = db.Column(db.String(10), unique=False)
    origin = db.Column(db.String(30), unique=False)
    label = db.Column(db.String(80), unique=False)
    genre = db.Column(db.String(80), unique=False)
    manager = db.Column(db.String(80), unique=False)
    website = db.Column(db.String(80), unique=False)
    facebook = db.Column(db.String(80), unique=False)
    twitter = db.Column(db.String(80), unique=False)
    youtube = db.Column(db.String(80), unique=False)
    soundcloud = db.Column(db.String(80), unique=False)
    active  = db.Column(db.Boolean, unique=False)



    def __init__(self, title, img, bio, band_mem, year, origin, label, genre, manager, website, facebook, twitter, youtube, soundcloud):
		self.title =title
		self.img = img
		self.bio = bio
		self.band_mem = band_mem
		self.year = year
		self.origin = origin
		self.label = label
		self.genre = genre
		self.manager = manager
		self.website = website
		self.facebook = facebook
		self.twitter = twitter
		self.youtube = youtube
		self.soundcloud = soundcloud
		self.active = active
    def __repr__(self):
        return '<band.title: %r>' % self.title
