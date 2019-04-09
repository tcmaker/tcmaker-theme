#!/bin/sh

gulp build

cp -R calendar tcmaker-calendar
zip -r tcmaker-calendar.zip tcmaker-calendar
mv tcmaker-calendar.zip dist/
rm -rf tcmaker-calendar

cp -R wordpress-theme tcmaker-theme
zip -r tcmaker-theme.zip tcmaker-theme
mv tcmaker-theme.zip dist/
rm -rf tcmaker-theme
