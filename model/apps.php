<?php

function getApps(): ?array
{
	if( ! $lines = file(  'db/apps.txt' ) ) return null;

	$apps = [];

	foreach( $lines as $line ) $apps[] = strLineToArr( $line );

	return $apps;
}

function strLineToArr( string $line ): array
{
	$line	= rtrim( $line );
	$parts	= explode( ';', $line );

	return ['date' => $parts[0], 'name' => $parts[1], 'phone' => $parts[2]];
}

function addApp( string $name, string $phone ): bool
{
	$date	= date( 'Y-d-m H:i:s' );
	$app	= "$date;$name;$phone\n";

	if( ! file_put_contents( 'db/apps.txt', $app, FILE_APPEND ) ) return false;

	return true;
}

