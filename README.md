# Deploy TheFlaskMegaTutorial Part 1 to Part 5 on OpenShift#

The guide to deploy [the flask mega tutorial part 1 to part 5](http://blog.miguelgrinberg.com/post/the-flask-mega-tutorial-part-i-hello-world) on OpenShift. Follow following steps

1. Create Python 2.6 application
```
rhc app create theflaskmegatutorial python-2.6
```

2. Pull the code from github repository
```
$ cd theflaskmegatutorial
$ git remote add upstream -m master https://github.com/shekhargulati/theflaskmegatutorial-part1-to-part5.git
$ git pull -s recursive -X theirs upstream master
``` 

3. Push the code to OpenShift application gear
```
$ git push
```

4. Login to OpenShift application gear
```
$ rhc ssh --app theflaskmegatutorial
```
When you are inside application gear do following steps

```
$ cd $OPENSHIFT_REPO_DIR/wsgi
$  . ~/python/virtenv/bin/activate
$ python db_create.py
``` 

The above steps will create SQLLite database in $OPENSHIFT\_DATA\_DIR.
