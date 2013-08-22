from setuptools import setup

setup(name='The Mega Flask Tutorial',
      version='1.0',
      description='The Mega Flask Tutorial Application',
      author='Shekhar Gulati',
      author_email='shekhargulati84@gmail.com',
      url='http://www.python.org/sigs/distutils-sig/',
#      install_requires=['Django>=1.3'],
	  install_requires=['flask' , 'flask-login' , 'flask-openid' , 'flask-email','sqlalchemy==0.7.9','flask-sqlalchemy' , 'sqlalchemy-migrate','flask-whooshalchemy','flask-wtf','flask-babel'],
     )
