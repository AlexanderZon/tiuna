@echo off
mongod
sails lift
start http://localhost:1337
exit