<?php

function getApps(): ?array
{
	if( ! $file = fopen( 'db/apps.txt', 'r' ) ) return null;

	$content = fread( $file, filesize( 'db/apps.txt' ) );
	fclose( $file );
	$lines = explode( "\n", $content );
	unset( $lines[count( $lines ) - 1] );	// Delete an empty element with line break symbol.
	$apps = [];

	foreach( $lines as $line ) $apps[] = strLineToArr( $line );

	return $apps;
}

function strLineToArr( string $line ): array
{
	$parts = explode( ';', $line );

	return ['date' => $parts[0], 'name' => $parts[1], 'phone' => $parts[2]];
}

function addApp( string $name, string $phone ): bool
{
	$date	= date( 'Y-d-m H:i:s' );
	$app	= "$date;$name;$phone\n";

	if( ! $file = fopen( 'db/apps.txt', 'a' ) ) return false;

	$bytes = fwrite( $file, $app );
	fclose( $file );

	if( ! $bytes ) return false;

	return true;
}

