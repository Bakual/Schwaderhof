REM This will generate the zipfiles for the Schwaderhof template in /build/packages
REM This needs the zip binaries from Info-Zip installed. An installer can be found http://gnuwin32.sourceforge.net/packages/zip.htm
setlocal
SET PATH=%PATH%;C:\Program Files (x86)\GnuWin32\bin
rmdir /q /s packages
mkdir packages
REM Template
cd ../tpl_schwaderhof/
zip -r ../build/packages/tpl_schwaderhof.zip *
