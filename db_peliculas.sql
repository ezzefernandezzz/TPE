-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2021 a las 01:59:40
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id_contenido` int(11) NOT NULL,
  `nombreContenido` varchar(30) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `actores` varchar(300) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `cantidadCapitulos` int(11) DEFAULT NULL,
  `cantidadTemporadas` int(11) DEFAULT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id_contenido`, `nombreContenido`, `descripcion`, `actores`, `id_genero`, `cantidadCapitulos`, `cantidadTemporadas`, `anio`) VALUES
(1, 'Friends', 'La serie trata sobre la vida de un grupo de amigos —Chandler Bing, Phoebe Buffay, Monica Geller, Ross Geller, Rachel Green y Joey Tribbiani— que residen en Manhattan, Nueva York. Suceden tanto buenos como malos momentos, pero con una crítica cómica a los hechos más trascendentales de la actualidad. Inmediatamente después del éxito en su país, el programa comenzó su difusión por todo el mundo con similares resultados. En marzo de 2019, fue considerada por The Hollywood Reporter como la mejor serie de la historia, 1​ siendo también votada en 2018, según Ranked, como la mejor comedia de situación de todos los tiempos. 2​\r\n\r\nLa serie tiene diez temporadas de unos 24 capítulos cada una —salvo la tercera y sexta temporada, que tuvieron 25 episodios, y la última, que tuvo 18 capítulos—.', 'Jennifer Aniston, Lisa Kudrow, Courteney Cox, Matthew Perry, Matt LeBlanc, David Schwimmer', 2, 236, 10, 1994),
(3, 'El Chavo del 8', 'El programa trata sobre las vivencias de un grupo de personas que habitan en una vecindad mexicana donde su protagonista, el Chavo, lleva a cabo travesuras junto con sus amigos que ocasionan malentendidos y discusiones entre los mismos vecinos, por lo general de tono cómico.', 'Roberto Gómez Bolaños,Carlos Villagrán,María Antonieta de las Nieves,Ramón Valdés,Florinda Meza,Rubén Aguirre,Édgar Vivar,Angelines Fernández', 2, 290, 7, 1971),
(4, 'Los Simpsons', 'La serie es una sátira a la \"típica familia estadounidense\". Se centra las diversas situaciones que vive la familia Simpson, compuesta por Homero, Marge, Bart, Lisa y Maggie.', 'Homero, Marge, Bart, Lisa, Maggie', 2, 709, 31, 1989),
(5, 'Interstellar', 'Narra las aventuras de un grupo de exploradores que hacen uso de un agujero de gusano recientemente descubierto para superar las limitaciones de los viajes espaciales tripulados y vencer las inmensas distancias que tiene un viaje interestelar.', 'Matthew McConaughey, Jessica Chastain, Anne Hathaway, Michael Caine, Casey Affleck, Mackenzie Foy, Timothée Chalamet, Bill Irwin, Matt Damon, Ellen Burstyn, John Lithgow, Wes Bentley, Topher Grace, David Oyelowo, David Gyasi, William Devane Josh', 6, NULL, NULL, 2014),
(6, 'Logan', 'Sin sus poderes, por primera vez, Wolverine es verdaderamente vulnerable. Después de una vida de dolor y angustia, sin rumbo y perdido en el mundo donde los X-Men son leyenda, su mentor Charles Xavier lo convence de asumir una última misión.', 'Hugh Jackman, Patrick Stewart, Dafne Keen, Boyd Holbrook, Stephen Merchant, Elizabeth Rodriguez, Richard E. Grant, Eriq La Salle, Elise Neal', 6, NULL, NULL, 2017),
(7, 'El Padrino', 'Don Vito Corleone, conocido dentro de los círculos del hampa como \"El Padrino\", es el patriarca de una de las cinco familias que ejercen el mando de la Cosa Nostra en Nueva York en los años 40. Don Corleone tiene cuatro hijos; una chica, Connie, y tres varones, Sonny, Michael y Freddie, al que envían exiliado a Las Vegas, dada su incapacidad para asumir puestos de mando en la \"Familia\". Cuando el Padrino reclina intervenir en el negocio de estupefacientes, empieza una cruenta lucha de violentos episodios entre las distintas familias del crimen organizado.', 'Marlon Brando, Al Pacino, James Caan, Richard S. Castellano, Robert Duvall, Sterling Hayden, John Marley, Richard Conte, Al Lettieri, Diane Keaton, Abe Vigoda, Talia Shire, Gianni Russo, John Cazale', 9, NULL, NULL, 1972),
(8, 'La La Land', 'Mia (Emma Stone), una joven aspirante a actriz que trabaja como camarera mientras acude a castings, y Sebastian (Ryan Gosling), un pianista de jazz que se gana la vida tocando en sórdidos tugurios, se enamoran, pero su gran ambición por llegar a la cima en sus carreras artísticas amenaza con separarlos.', 'Emma Stone, Ryan Gosling, John Legend, Rosemarie DeWitt, J.K. Simmons, Amiée Conn, Terry Walters, Thom Shelton, Cinda Adams, Callie Hernandez, Jessica Rothe, Sonoya Mizuno, Claudine Claudio', 7, NULL, NULL, 2016),
(9, 'Silent Hill', 'Rose, desesperada por encontrar una cura para la misteriosa enfermedad de su hija Sharon, rehúsa ingresar a la niña en una institución psiquiátrica a pesar de las recomendaciones de los médicos, y decide huir a Silent Hill, un pueblo del que su hija habla constantemente en sueños. A pesar de que su marido Christopher se opone al viaje, Rose está convencida de que la respuesta se encuentra en este misterioso lugar.', 'Radha Mitchell, Sean Bean, Laurie Holden, Deborah Kara Unger', 4, NULL, NULL, 2006),
(10, 'El Bueno, el Malo y el Feo', 'Tres hombres violentos pelean por una caja que alberga 200 000 dólares, la cual fue escondida durante la Guerra Civil. Dado que ninguno puede encontrar la tumba donde está el botín sin la ayuda de los otros dos, deben colaborar, pese a odiarse.', 'Clint Eastwood, Eli Wallach, Lee Van Cleef', 10, NULL, NULL, 1966),
(11, 'Por un puñado de dólares', 'El misterioso \"Hombre sin Nombre\" se involucra en una guerra entre bandas rivales, en un pueblo fronterizo mexicano.', 'Clint Eastwood, Gian Maria Volonté, Marianne Koch, Mario Brega', 10, NULL, NULL, 1964),
(12, 'Drive', 'Durante el día, Driver (Ryan Gosling) trabaja en un taller y es conductor especialista de cine, pero, algunas noches de forma esporádica, trabaja como chófer para delincuentes. Shannon (Brian Cranston), su mentor y jefe, que conoce bien su talento al volante, le busca directores de cine y televisión o criminales que necesiten al mejor conductor para sus fugas, llevándose la correspondiente comisión. Pero el mundo de Driver cambia el día en que conoce a Irene (Carey Mulligan), una guapa vecina que tiene un hijo pequeño y a su marido en la cárcel.', 'Ryan Gosling, Carey Mulligan, Bryan Cranston, Albert Brooks, Oscar Isaac, Christina Hendricks, Ron Perlman, Kaden Leos, Jeff Wolfe', 5, NULL, NULL, 2011),
(13, 'Taxi Driver', 'Para sobrellevar el insomnio crónico que sufre después de su regreso de Vietnam, Travis decide trabajar como taxista nocturno. Como individuo tiene poco contacto con la gente, pero observa la violencia y desolación en la que se hunde la ciudad de Nueva York. Travis anota en su diario todas sus impresiones, hasta que un día decide pasar a la acción.', 'Robert De Niro, Jodie Foster, Albert Brooks, Harvey Keitel, Cybill Shepherd, Peter Boyle, Leonard Harris, Diahnne Abbott, Gino Ardito, Martin Scorsese', 5, NULL, NULL, 1976),
(14, 'Nightcrawler', 'Un joven descubre el mundo del periodismo freelance en un ambiente nada seguro para esta profesión, el mundo criminal de la ciudad de Los Ángeles, en California. La vida del joven va a cambiar mucho debido a este descubrimiento, rozando incluso el débil límite existente entre el riesgo y la peligrosidad.', 'Jake Gyllenhaal, Rene Russo, Riz Ahmed, Bill Paxton, Kevin Rahm, Michael Hyatt, Price Carson, Kent Shocknek, Sharon Tay, Ann Cusack, Carolyn Gilroy, Marco Rodríguez, Michael Papajohn', 5, NULL, NULL, 2014),
(15, 'Rápidos y Furiosos Tokyo Drift', 'Shaun Boswell es un chico que no acaba de encajar en ningún grupo. Su única conexión con el mundo de indiferencia que le rodea es a través de las carreras ilegales, lo que no le ha convertido en el chico favorito de la policía. Cuando amenazan con encarcelarle, le mandan fuera del país a pasar una temporada con su tío, un militar destinado en Japón. En el país donde nacieron la mayoría de los coches modificados, las simples carreras en la calle principal han sido sustituidas por el último reto automovilístico que desafía la gravedad, las carreras de \"drift\" (arrastre), una peligrosa mezcla de velocidad en pistas con curvas muy cerradas y en zigzag. En su primera incursión en el salvaje mundo de las carreras de \"drift\", Shaun acepta ingenuamente conducir un D.K, el Rey del Drift, que pertenece a los Yakuza, la mafia japonesa. Para pagar su deuda, no tiene más remedio que codearse con el hampa de Tokio y jugarse la vida.', 'Lucas Black,\r\nSung Kang,\r\nBow Wow,\r\nBrian Tee,\r\nJason Tobin,\r\nLeonardo Nam,\r\nNathalie Kelley,\r\nKeiko Kitagawa,\r\nVin Diesel', 8, NULL, NULL, 2006),
(16, 'Rush Hour', 'Dos detectives diferentes son asignados en un mismo caso. Ambos tendrán que adaptarse a las costumbres del otro para poder concluir su trabajo con éxito, pero no va a ser una tarea fácil.', 'Jackie Chan, Chris Tucker, Ken Leung, Tom Wilkinson, Tzi Ma, Chris Penn, Robert Littman, Michael Chow, Julia Hsu, Kai Lennox, Elizabeth Peña, Roger Fan, George Cheung, Larry Sullivan, Rex Linn, Lucy Lin', 8, NULL, NULL, 1998),
(17, 'La gran apuesta', 'Cuando cuatro tipos fuera del sistema descubren que los grandes bancos, los medios de comunicación y el gobierno se niegan a reconocer el colapso de la economía, tienen una idea: \"La Gran Apuesta\"… pero sus inversiones de riesgo les conducen al lado oscuro de la banca moderna, donde deben poner en duda todo y a todos... Adaptación del libro “La gran apuesta” de Michael Lewis, que reflexiona sobre la quiebra del sector inmobiliario norteamericano que originó la crisis económica mundial en 2008.', 'Christian Bale, Steve Carell, Ryan Gosling, Brad Pitt, Melissa Leo, Hamish Linklater, John Magaro, Rafe Spall, Jeremy Strong, Finn Wittrock, Marisa Tomei, Tracy Letts, Byron Mann, Adepero Oduye, Karen Gillan, Max Greenfield, Billy Magnussen', 5, NULL, NULL, 2015),
(18, 'Rocky', 'Rocky Balboa es un desconocido boxeador a quien se le ofrece la posibilidad de pelear por el título mundial de los pesos pesados. Con mucha fuerza de voluntad, Rocky se preparará concienzudamente para este combate, y también para los cambios que producirá en su vida.', 'Sylvester Stallone, Talia Shire, Burt Young, Carl Weathers, Burgess Meredith, Thayer David, Joe Spinell, Tony Burton, Joe Frazier, Jimmy Gambin', 5, NULL, NULL, 1976),
(19, 'Rambo', 'John Rambo, antiguo boina verde, va a visitar a un antiguo compañero de armas y recibe la noticia de que éste ha muerto como consecuencia de los efectos de la guerra. A pocos días, la policía detiene a Rambo por vagabundo y se ensaña con él. Entonces recuerda las torturas que sufrió en Vietnan y reacciona violentamente.', 'Sylvester Stallone, Richard Crenna, Brian Dennehy, Bill McKinney, Jack Starrett, Michael Talbott, Chris Mulkey, John McLiam, Alf Humphreys, David Caruso, David L. Crowley, Don MacKay', 8, NULL, NULL, 1982),
(20, 'Peaky Blinders', 'La serie está ambientada en el mundo de los gangsters de los años 20, en Birmingham. Un joven a lomos de un hermoso corcel negro recorre las calles de Birmingham (Inglaterra). Estamos en 1919, la Gran Guerra ha terminado, pero aquel individuo posee el don de atemorizar a su paso a cualquier transeúnte. ¿Quién es? ¿Por qué les asusta tanto? Al parecer busca un hechizo, una pócima, que garantice la victoria de su caballo de carreras. Una mujer oriental proveerá al temido muchacho de una mágica especia que hará que el noble animal equino logre su fin.', 'Cillian Murphy, Paul Anderson, Helen McCrory, Sophie Rundle, Joe Cole, Finn Cole, Aimee-Ffion Edwards, Jordan Bolger, Adrien Brody, Aidan Gillen, Dave Simon', 5, 30, 6, 2014),
(21, 'The Office', 'Steve Carell protagoniza The Office, un fresco y divertido vistazo, con formato pseudo-documental, al día a día en la vida de unos excéntricos trabajadores de la empresa Dunder Mifflin. El serio pero despistadísimo director Michael Scott se considera un magnífico jefe y mentor, pero realmente inspira más críticas que respeto a sus empleados.', 'Rainn Wilson, John Krasinski, Leslie David Baker, Brian Baumgartner', 2, 188, 9, 2005);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nombreGenero` varchar(30) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombreGenero`, `descripcion`) VALUES
(2, 'Comedia', 'Género que intenta provocar la risa de la audiencia. Junto con el drama y la ciencia ficción, la comedia es uno de los más importantes géneros cinematográficos.'),
(4, 'Terror', 'Género filmográfico que se caracteriza por su voluntad de provocar en el espectador sensaciones de pavor, terror, miedo, disgusto, repugnancia, horror, incomodidad o preocupación'),
(5, 'Suspenso', 'Género que tiene como principal objetivo, mantener al espectador en un estado de tensión, sobre lo que pueda ocurrir con los personajes, y por lo tanto, atento al desarrollo del conflicto.'),
(6, 'Ciencia Ficción', 'Género filmográfico que utiliza la ciencia para fundamentar narraciones con representaciones especulativas de fenómenos imaginarios como extraterrestres, planetas alienígenas y viajes en el tiempo o en el espacio exterior.'),
(7, 'Musical', 'Todas aquellas producciones filmográficas que ofrecen canciones o temas musicales bailables en una parte fundamental de su desarrollo argumental.'),
(8, 'Acción', 'Género que se caracteriza por la violencia y por la espectacularidad de las imágenes.'),
(9, 'Crimen', 'Las películas de crimen, en el sentido más amplio, son un género cinematográfico inspirado en la ficción policíaca del género literario. Las películas de este género generalmente implican varios aspectos de actos criminales.'),
(10, 'Western', 'El wéstern​ es un género cinematográfico típico del cine estadounidense que se ambienta en el viejo Oeste estadounidense.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombreUsuario` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombreUsuario`, `password`) VALUES
(1, 'eze', '$2y$10$mapSntRhoyRkWRTznsfTguysNy1HCbeVcBqBzm2B3X1m6mjlju8gy'),
(4, 'ezee', '$2y$10$g0vrHNRNKPuNiNnT8fG7uuu.2OkqYFjpcGjrliXgof32A2pmEIDbi'),
(5, 'ezeee', '$2y$10$A/snRSGVp1tVJzMjFZI.z.9VFHZnCmvr1jqTRXpefbBmoXzBrio8y'),
(8, 'ez', '$2y$10$iGheQNek6aXBPdBto5Qs2u346HefU/6DnbkvWvrqQc7QYra0XL0w6'),
(11, 'eza', '$2y$10$c.nGnpg8juff0XgQ1CZyDunTH//ujfDSXxTMOt89zXOpF2.RCFpx6'),
(14, 'ef', '$2y$10$Oz2ooTSezp2ck.D.1hb7POyMSWl7OzPgsOQh8FfKZQkpMny8fXup.'),
(15, 'l', '$2y$10$unVNzot3MvX25DZduZ0pd.JjTa/bXaecDD3CUcun/gorgaQc648py'),
(17, 'l2', '$2y$10$lXbYVy93pv/eFUXGmsK3yOg9qTMmS.SmxyF/v9kanatFtQAfRWcFa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id_contenido`),
  ADD KEY `fk_id_genero` (`id_genero`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`),
  ADD UNIQUE KEY `nombreNoRepetible` (`nombreGenero`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombreNoRepetible` (`nombreUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id_contenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `contenido_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
