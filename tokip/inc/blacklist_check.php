<?php
class IpList {
    private $iplist = array();
    private $ipfile = "";
    public function __construct( $list ) {
        $contents = array();
        $this->ipfile = $list;
        $lines = $this->read( $list );
        foreach( $lines as $line ) {
            $line = trim( $line );
            if ( empty($line ) ) { continue; }
            if ( $line[0] == '#' ) { continue; }
            $temp = explode( "#", $line );
            $line = trim( $temp[0] );
            $contents[] = $this->normal($line);
        }
        $this->iplist = $contents;
    }
    public function is_inlist( $ip ) {
        $retval = false;
        foreach( $this->iplist as $ipf ) {
            $retval = $this->ip_in_range( $ip, $ipf );
            if ($retval === true ) {
                $this->range = $ipf;
                break;
            }
        }
        return $retval;
    }
    public function message() { return $this->range; }
    private function read( $fname ) {
        try { $file = @file( $fname, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES ); }
        catch( Exception $e ) { throw new Exception( $fname.': '.$e->getmessage() . '\n'); }
        return $file ?: [];
    }
    private function ip_in_range( $ip, $range ) {
        if ( strpos($range, '/') !== false ) {
            list( $range, $netmask ) = explode( '/', $range, 2 );
            if ( strpos( $netmask, '.' ) !== false ) {
                $netmask = str_replace('*', '0', $netmask );
                $dnetmask = ip2long( $netmask );
                return ((ip2long( $ip ) & $dnetmask) == (ip2long($range) & $dnetmask ));
            } else {
                if ($netmask < 0 || $netmask > 32) { return false; }
                $dnetmask = ~(pow( 2, ( 32 - $netmask)) - 1);
                return ((ip2long($ip) & $dnetmask)==(ip2long($range) & $dnetmask));
            }
        } else {
            if ( strpos( $range, '*' ) !== false ) {
                $low = str_replace( '*', '0', $range );
                $high = str_replace( '*', '255', $range );
                $range = $low.'-'.$high;
            }
            if ( strpos( $range, '-') !== false ) {
                list( $low, $high ) = explode( '-', $range, 2 );
                $ip = ip2long($ip);
                return ($ip >= ip2long($low) && $ip <= ip2long($high));
            }
        }
        return ( $ip == $range );
    }
    private function normal( $range ) {
        return str_replace( ' ', '', $range );
    }
}

class IpBlockList {
    private $blacklist;
    private $message   = NULL;
    public function __construct($blacklistfile) {
        if (file_exists($blacklistfile)) {
            $this->blacklist = new IpList($blacklistfile);
        } else {
            $this->blacklist = null;
        }
    }
    public function isBlocked($ip) {
        if ($this->blacklist === null || !filter_var($ip, FILTER_VALIDATE_IP)) {
            return false;
        }
        if ($this->blacklist->is_inlist($ip)) {
            $this->message = $ip . " kara listede bulundu: " . $this->blacklist->message();
            return true;
        }
        return false;
    }
    public function getMessage() {
        return $this->message;
    }
}