/*Just if your characters db name is characters*/
UPDATE website.realms SET char_db = 'characters' WHERE id>0; 

ALTER TABLE website.realms MODIFY char_db VARCHAR(255) NOT NULL DEFAULT 'characters';

UPDATE website.version SET Revision='183' WHERE Name='AquaFlameCMS';