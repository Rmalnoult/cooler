
while (<STDIN>) {
	chomp;
	if (/test/) {
		print “In line <$_>: $&\n”;
	}
}