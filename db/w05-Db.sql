-- Week 05 Team Assignment BEGINS
CREATE TABLE scriptures (
    scripture_id  INT GENERATED ALWAYS AS IDENTITY,
    scripture_book   VARCHAR(40) NOT NULL,
    scripture_chapter   SMALLINT NOT NULL,
    scripture_verse   SMALLINT NOT NULL,
    scripture_content   TEXT NOT NULL,
    PRIMARY KEY (scripture_id),
    CHECK (scripture_chapter > 0),
    CHECK (scripture_verse > 0)
);

INSERT INTO scriptures (scripture_book, scripture_chapter, scripture_verse, scripture_content)
VALUES ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.'),
('Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'),
('Doctrine and Covenants', 93, 28, 'Man was also in the beginning with God. Intelligence, or the light of truth, was not created or made, neither indeed can be.'),
('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');
-- Week 05 Team Assignment ENDS


-- Week 06 Team Assignment BEGINS
CREATE TABLE topics (
    topic_id  INT GENERATED ALWAYS AS IDENTITY,
    topic_name   TEXT NOT NULL,
    PRIMARY KEY (topic_id)
);

CREATE TABLE scriptures_topics (
    scripture_id INT NOT NULL REFERENCES scriptures(scripture_id) ON DELETE CASCADE,
    topic_id INT NOT NULL REFERENCES topics(topic_id) ON DELETE CASCADE  
);

INSERT INTO topics (topic_name)
VALUES ('Faith'), ('Sacrifice'), ('Charity');

GRANT ALL PRIVILEGES ON TABLE topics TO cseuser;
GRANT ALL PRIVILEGES ON TABLE scriptures_topics TO cseuser;
GRANT SELECT, INSERT, UPDATE, DELETE ON ALL TABLES IN SCHEMA public TO cseuser;
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public TO cseuser;
-- Week 06 Team Assignment ENDS

