@echo off
REM Citrix PVS machines using a single source will screw with the splunk agent
REM this batch will personalize the splunk agent before any services fire
ECHO Running AutoExNt.bat >> c:\autoexnt.log
DATE /T >> c:\autoexnt.log
TIME /T >> C:\autoexnt.log
FOR /F "usebackq" %%i IN (`hostname`) DO SET HOSTNAME=%%i
ECHO %HOSTNAME%
ECHO [general] >> server.conf
ECHO serverName = %HOSTNAME% >> server.conf
ECHO. >> server.conf
ECHO [sslConfig] >> server.conf
ECHO sslKeysfilePassword = _REPLACEWITHSSLKEYPASSWORD_ >> server.conf
ECHO [default] >> inputs.conf
ECHO host = %HOSTNAME% >> inputs.conf
MOVE server.conf c:\Progra~1\Splunk\etc\system\local\
ECHO moved server.conf >> C:\autoexnt.log
MOVE inputs.conf c:\Progra~1\Splunk\etc\system\local\
ECHO moved inputs.conf >> C:\autoexnt.log
NET START SplunkWeb
ECHO starting SplunkWeb >> C:\autoexnt.log
NET START Splunkd
echo starting Splunkd >> C:\autoexnt.log
