brain-games:
	./bin/brain-games
	composer validate

brain-even:
	./bin/brain-even

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

install:
	composer install