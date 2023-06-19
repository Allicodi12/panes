-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 14-06-2023 a las 07:03:46
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `respaldo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galletas`
--

CREATE TABLE `galletas` (
  `idga` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `nombre_usuario` longtext NOT NULL,
  `titulo` longtext NOT NULL,
  `categoria` longtext NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `contenido` longtext NOT NULL,
  `fecha` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `galletas`
--

INSERT INTO `galletas` (`idga`, `id`, `nombre_usuario`, `titulo`, `categoria`, `imagen`, `contenido`, `fecha`) VALUES
(1312, 10, 'Dianita', ' Galletas tortuga de chocolate y vainilla', 'galleta', 'tortu.png', 'Usaremos 250 grs de harina de trigo, 125 grs de mantequilla a temperatura ambiente,150 grs de azúcar glas,1 huevo, 35 grs de cacao puro en polvo desgrasado 0% azúcares añadidos Valor, 1/2 cucharadita de vainilla, 32 pepitas de chocolate negro previamente congeladas.\r\nPreparamos todos los ingredientes a temperatura ambiente. Esto es muy importante para elaborar las galletas correctamente. Dejé todo fuera por la noche y me puse manos a la obra a la mañana siguiente.\r\n\r\nYo he usado el robot de cocina ya que me es más cómodo pero se puede hacer igualmente a mano mezclando todos los ingredientes en un bol. En el bol del robot de cocina ponemos la mantequilla a temperatura ambiente o a punto de pomada y añadimos el azúcar glas previamente tamizado. Colocamos el accesorio gancho y mezclamos hasta formar una crema homogénea. Añadimos el huevo y el extracto de vainilla y batimos. Después, incorporamos la harina tamizada en varias tandas mientras mezclamos a velocidad un poco más baja. Cuando la harina esté integrada, paramos el robot y sacamos la masa para depositarla en la encimera de la mesa.\r\nAmasamos con las manos un poco hasta darle forma de bola que será brillante y nada pegajosa. La pesamos. La mía de 570 grs y la dividemos en dos partes, a ser posible que la blanca tenga un poco más de cantidad. A la otra parte le ponemos el cacao en polvo y amasamos hasta unificar bien el color. Forramos ambas masas con film transparente y dejamos que reposen en la nevera durante 1 hora.\r\n\r\nPasado el tiempo toca darle forma de tortuga a nuestras galletas. Yo he ido pesando las partes para que todas me salieran igual. Podéis hacerlo a ojo pero tal vez os sirva de ayuda. El caparazón de chocolate pesa unos 20 grs. La cabeza 10 y las patas 4 grs cada una. Con estas cantidades me salieron 16 tortugas y me sobró masa de chocolate para 2 caparazones más, por eso digo dejar un poquito más de cantidad en la masa blanca.\r\nCuando tengamos todas las piezas listas, las depositamos sobre papel vegetal. Colocamos las 4 patitas juntas y la cabeza. Encima ponemos el caparazón al que habremos hecho las marcas con un palillo, apretamos un poquito y le ponemos los ojitos con las pepitas de chocolate. Es importante que estén congeladas para que aguanten bien el horneado. Cuando tengamos una bandeja llena las guardamos en la nevera durante 1 hora y media.\r\n\r\nPasado el tiempo, metemos la bandeja al horno precalentado a 180º C durante 14-15 minutos en la parte central con calor arriba y abajo. Veremos que están listas cuando las patas comiencen a dorarse. Sacamos la bandeja del horno y dejamos reposar las galletas durante un par de minutos ya que aún estarán blanditas. Después, con ayuda de una espátula pequeña pasamos nuestras galletas tortuga de chocolate y vainilla con cuidado a una rejilla y dejaremos que se enfríen totalmente.', '2023-06-13'),
(1992, 10, 'Dianita', 'Galletas en forma de conejitos o ratones sin gluten', 'galleta', 'conejo.png', 'En un recipiente, mezcla 100 gramos de harina de arroz, 100 gramos de harina panificable sin gluten (puedes usar harina de garbanzo como sustituto), 100 gramos de maicena y 100 gramos de almendra molida. Agrega 80 gramos de azúcar (puedes aumentar la cantidad a 125-180 gramos si prefieres más dulce), la ralladura de 1 limón (o una ampolla de esencia de limón) y una cucharadita de esencia de vainilla (o una vaina de vainilla).\r\n\r\nEn otro recipiente, mezcla la mantequilla con el azúcar, la ralladura de limón y la vainilla hasta obtener una mezcla homogénea. Añade el huevo y mezcla hasta que se integre.\r\n\r\nTamiza las harinas, la almendra molida y la sal en un bol aparte. Añade toda la mezcla de mantequilla a este bol y mezcla con una cuchara hasta que todo se integre. Envuelve la masa en papel film transparente y déjala en la nevera durante toda una noche o al menos 3 horas.\r\n\r\nAl día siguiente, divide la masa en bolas de 30 gramos (obtendrás alrededor de 21-22 bolas) y reserva una de ellas para hacer las orejas. Con las manos ligeramente untadas en aceite, aplana las bolas y dales forma alargada, como un cono de masa sin ser puntiagudo.\r\n\r\nToma dos pequeñas bolitas de masa de la bola reservada y péguelas en el cono para hacer las orejas. Puedes ayudarte con un palillo de dientes para pegarlas, dar forma y hacer los ojos.\r\n\r\nColoca los conejos en una bandeja de hornear forrada con papel, cúbrelos con un poco de papel film y colócalos en la nevera mientras precalientas el horno.\r\n\r\nUna vez que el horno esté precalentado, pinta los conejos con yema de huevo si deseas que adquieran un color dorado más fácilmente. Hornea a 180-200ºC durante unos 15 minutos, o hasta que estén ligeramente dorados. Retira del horno y deja enfriar.\r\n\r\nConserva los conejos ya fríos en una bolsa hermética o lata. ¡Disfruta de tus deliciosos conejitos de masa!', '2023-06-14'),
(3242, 10, 'Dianita', 'DOGGIES COOKIES', 'galleta', 'dog.png', 'Se usara 180 gr de mantequilla a temperatura ambiente, 200 gr de harina, 25 gr de harina de maíz (maicena), 25 g de leche en polvo, la receta original la lleva aunque yo no la puse. Si la masa se os pega a las manos, podéis sustituir la leche en polvo por 25 gr de harina. Chips de chocolate, un puñado de copos de chocolate tipo Chocapic de Nestlé o Choco Krispies de Kelloggs, 50 gr de azúcar, fideos de chocolate. Precalentamos el horno a temperatura media. Batimos la mantequilla junto con el azúcar hasta que duplique su tamaño. Tamizamos los dos tipos de harina y la leche en polvo (si la añadís). Mezclamos bien y amasamos. Si vemos que la masa se nos pega a las manos le podemos añadir 25 gr de harina más. Formamos bolas con la masa procurando que todas queden del mismo tamaño y las aplanamos un poquito. En el interior de cada bola de masa le podemos meter tres o cuatro chips de chocolate. Insertamos un chip en el centro de la bola de masa para formar la nariz. Para hacer las orejas usaremos dos copos de cereales de chocolate, las clavaremos en la masa. Los ojos los haremos pegando unos fideos de chocolate a la masa, para ello podéis utilizar un pincel humedecido en agua. Horneamos a temperatura media durante 10 ó 15 minutos dependiendo del tamaño de la galleta. Las sacamos del horno y las dejamos enfriar encima de una rejilla.', '2023-06-13'),
(12098, 10, 'Dianita', 'Galletas en forma de reno', 'galleta', 'reno.png', 'Se usará mantequilla dulce	180 g, azúcar	200 g, huevos	 2, harina	350 g, chocolate negro	80 g, smarties	1 paquete.\r\nDerrite la mantequilla y mézclala suavemente con el azúcar en un bol. Luego añade un huevo entero y una yema de huevo y mezcla bien. Añade la harina.\r\nTrabaja la masa con las manos para formar una bola. Luego déjala reposar por 30 minutos en la nevera.\r\nPrecalienta el horno a 180° C. Sobre una superficie plana y enharinada, extiende la masa. Pasa los cortadores de galletas por harina y corta las galletas deseadas.\r\nColoca las galletas en una bandeja para horno con papel de horno. Hornea por 10 minutos y deja enfriar.\r\nUna vez que las galletas estén frías, procede con la decoración. Derrite el chocolate al baño maría y utiliza un palito de manera para dibujar los ojos y los cuernos de los renos. Pon un smarties rojo en cada galleta para hacer la nariz del reno.\r\nSirve las galletas de reno.', '2023-06-12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `galletas`
--
ALTER TABLE `galletas`
  ADD UNIQUE KEY `idga` (`idga`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
