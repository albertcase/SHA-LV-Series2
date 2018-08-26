#!/bin/bash
set -x
set -e

PRO_SRV='case'
PRO_WWW='/data/sites/lv_series2'

rsync \
  --exclude=.DS_Store \
  --exclude=.git/ \
  --exclude=.gitignore \
  --exclude=.vagrant \
  --exclude=*.box\
  --exclude=*.bz2\
  --exclude=*.sql\
  --exclude=*.tgz\
  --exclude=*.log\
  --exclude=deploy.sh \
  --exclude=video \
  --exclude=puppet \
  --exclude=ws/private/conf \
  --exclude=ws/upload \
  --exclude=ws/videos \
  --exclude=video/ws/upload \
  --exclude=video/ws/videos_generate \
  --delete \
  -arvP ./ $PRO_SRV:$PRO_WWW

