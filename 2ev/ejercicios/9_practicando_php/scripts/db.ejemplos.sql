INSERT INTO usuarios (nombre, passwd, img, correo, descripcion)
    VALUES ('admin', '$2y$10$bH6ZpLC3P4hEkCcp5TiHmOgn37KyZZqs9blKaMi8BkeuMwK/7hm7a','admin.png', 'jorge.duenas@educa.madrid.org', 'Blablablabla');

INSERT INTO usuarios (nombre, passwd, img, correo, descripcion)
    VALUES ('pepe', '$2y$10$PiLMC2KTlDHeFeZtp/WV7ehhk.Q3T0X2ajqy3DKjrvI01cNimLy6u','pepe.png', 'pepe@educa.madrid.org', 'Blablablabla');

select u.id, u.nombre from usuarios u left join tokens t on u.id = t.id_usuario where t.valor = '6383d3eb57485e1a5b4a66a2f675550268936ce7d4c72c19c4c30fba3125a7af011e48fce029c718cfdeca2d81d1bc4468d2e264bdd31e2a3d9b3401027788aa' and t.expiracion > now();