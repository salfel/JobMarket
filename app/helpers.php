<?php

function importantClasses(string $value): string {
	$classes = explode(' ', $value);
	$classes = array_map(fn($value) => '!'.$value, $classes);
	return implode(' ', $classes);
}
