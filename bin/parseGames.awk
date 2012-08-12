#!/usr/bin/awk -f

# awk -f parseGames.awk ../data/games.txt > ../data/games.js 

BEGIN {
	FS="	"
}

{
	print "db.games.save({ \"awayTeam\": { \"abbreviation\": \"" $2 "\" }, \"homeTeam\": { \"abbreviation\": \"" $1 "\" }, \"kickoff\": ISODate(\"" $5 "\"), \"line\": " $8 ", \"season\": " $3 ", \"week\": " $4 " });"
}
