brain-games:
	./bin/brain-games
	composer validate

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc

brain-gcd:
	./bin/brain-gcd

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

install:
	composer install