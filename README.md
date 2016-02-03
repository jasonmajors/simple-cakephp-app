#Where's Whales
This is a very basic CakePHP application developed to familiarize myself with the framework. The gist of it is a questionably-useful whale watching application where an individual could enter the species, location, and datetime they viewed a whale. Anyone can then search the sightings and I used AJAX to filter by location and/or species. 

Additionally, users can query the database through the API and return the data in JSON format like so:

../json/location/[location] will query as:

SELECT * FROM whales
WHERE location LIKE [location]

../json/species/[species] will query as:

SELECT * FROM whales
WHERE species LIKE [species]

Further,
../json_query?location=[location]&species=[species] will query as:

SELECT * FROM whales
WHERE location LIKE [location] AND species LIKE [species]
