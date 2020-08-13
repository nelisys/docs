# Schedule

## Create Task

Example to run every minute.

```
C:\> SCHTASKS /CREATE /SC MINUTE /TN "MyTask\RunReport" /TR "C:\MyApp\run-report.bat"
SUCCESS: The scheduled task "MyTask\RunReport" has successfully been created.
```

## Query Task

```
C:\> SCHTASKS /QUERY /TN "MyTask\RunReport"

Folder: MyTask
TaskName                                 Next Run Time          Status
======================================== ====================== ===============
RunReport                                8/12/2020 7:32:00 PM   Ready
```

## Delete Task

```
C:\> SCHTASKS /DELETE /TN "MyTask\RunReport"
WARNING: Are you sure you want to remove the task "MyTask\RunReport" (Y/N)? y
SUCCESS: The scheduled task "MyTask\RunReport" was successfully deleted.
```

```
C:\> SCHTASKS /QUERY /TN "MyTask\RunReport"
ERROR: The system cannot find the path specified.
```
