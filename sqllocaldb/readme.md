# SQLLocalDB

## SQL 2014

```
C:\> sqllocaldb info
MSSQLLocabDB

C:\> sqllocaldb create test
LocalDB instance "test" created with version 12.0.2000.8.

C:\> sqllocaldb info
MSSQLLocabDB
test

C:\> sqllocaldb info test
Name:               test
Version:            12.0.2000.8
Shared name:
Owner:              DESKTOP-88AAUU5\admin
Auto-create:        No
State:              Stopped
Last start time:    7/25/2020 10:08:29 AM
Instance pipe name:


C:\>sqllocaldb share test testshared
Sharing of LocalDB instance "test" with shared name "testshared" failed because of the following error:
Administrator privileges are required in order to execute this operation.
```

Run as Administrator

```

C:\>sqllocaldb share test testshared
Private LocalDB instance "test" shared with the shared name: "testshared".

C:\>sqllocaldb info
.\testshared
MSSQLLocalDB
test

C:\>sqllocaldb info test
Name:               test
Version:            12.0.2000.8
Shared name:        testshared
Owner:              DESKTOP-88AAUU5\admin
Auto-create:        No
State:              Stopped
Last start time:    7/25/2020 10:08:29 AM
Instance pipe name:


C:\>sqllocaldb start test
LocalDB instance "test" started.

C:\>sqllocaldb info test
Name:               test
Version:            12.0.2000.8
Shared name:        testshared
Owner:              DESKTOP-88AAUU5\admin
Auto-create:        No
State:              Running
Last start time:    7/25/2020 10:12:51 AM
Instance pipe name: np:\\.\pipe\LOCALDB#SH88CC76\tsql\query
```

## ref

```
SqlLocalDB.exe create "DeptLocalDB"  
SqlLocalDB.exe share "DeptLocalDB" "DeptSharedLocalDB"  
SqlLocalDB.exe start "DeptLocalDB"  
SqlLocalDB.exe info "DeptLocalDB"  
REM The previous statement outputs the Instance pipe name for the next step  
sqlcmd -S np:\\.\pipe\LOCALDB#<use your pipe name>\tsql\query  
CREATE LOGIN NewLogin WITH PASSWORD = 'Passw0rd';   
GO  
CREATE USER NewLogin;  
GO  
EXIT  
```

```
sqlcmd -S (localdb)\.\DeptSharedLocalDB -U NewLogin -P Passw0rd
```
