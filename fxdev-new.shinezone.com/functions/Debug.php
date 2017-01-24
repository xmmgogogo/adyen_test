<?php
require_once __DIR__ . "/XLog.php";

function logError( $num, $str, $file, $line, $context = null )
{
    $filename  = XLog::processFileName("/tmp/error.log", XLog::getSystemType());
    XLog::formatLog("logError","error number:$num, msg:$str $file:$line". PHP_EOL, $filename);
    return true;
}
function logException( Exception $e )
{
    if ( defined('OPEN') && OPEN == true )
    {
        print "<div style='text-align: center;'>";
        print "<h2 style='color: rgb(190, 50, 50);'>Exception Occured:</h2>";
        print "<table style='width: 800px; display: inline-block;'>";
        print "<tr style='background-color:rgb(230,230,230);'><th style='width: 80px;'>Type</th><td>" . get_class( $e ) . "</td></tr>";
        print "<tr style='background-color:rgb(240,240,240);'><th>Message</th><td>{$e->getMessage()}</td></tr>";
        print "<tr style='background-color:rgb(230,230,230);'><th>File</th><td>{$e->getFile()}</td></tr>";
        print "<tr style='background-color:rgb(240,240,240);'><th>Line</th><td>{$e->getLine()}</td></tr>";
        print "</table></div>";
    }
    else
    {
        $message = "Type: " . get_class( $e ) . "; Message: {$e->getMessage()}; File: {$e->getFile()}; Line: {$e->getLine()};";
        XLog::formatLog("exceptions","exceptions $message". PHP_EOL,"/tmp/error.log");
    }
    exit();
}
function LogFatalError()
{
    $error = error_get_last();
    if ( $error["type"] == E_ERROR )
    {
        logError( $error["type"], $error["message"], $error["file"], $error["line"] );
    }
}
register_shutdown_function( "LogFatalError" );
set_error_handler( "logError" );
set_exception_handler( "logException" );