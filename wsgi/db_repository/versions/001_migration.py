from sqlalchemy import *
from migrate import *


from migrate.changeset import schema
pre_meta = MetaData()
post_meta = MetaData()
bands = Table('bands', post_meta,
    Column('id', Integer, primary_key=True, nullable=False),
    Column('title', String(length=100), nullable=False),
    Column('img', String(length=50)),
    Column('bio', String(length=5000)),
    Column('band_mem', String(length=5000)),
    Column('year', String(length=10)),
    Column('origin', String(length=30)),
    Column('label', String(length=80)),
    Column('genre', String(length=80)),
    Column('manager', String(length=80)),
    Column('website', String(length=80)),
    Column('facebook', String(length=80)),
    Column('twitter', String(length=80)),
    Column('youtube', String(length=80)),
    Column('soundcloud', String(length=80)),
    Column('active', Boolean),
)


def upgrade(migrate_engine):
    # Upgrade operations go here. Don't create your own engine; bind
    # migrate_engine to your metadata
    pre_meta.bind = migrate_engine
    post_meta.bind = migrate_engine
    post_meta.tables['bands'].columns['active'].create()


def downgrade(migrate_engine):
    # Operations to reverse the above upgrade go here.
    pre_meta.bind = migrate_engine
    post_meta.bind = migrate_engine
    post_meta.tables['bands'].columns['active'].drop()
