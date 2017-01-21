<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data = array(
			[
				'name' 			=> 'Cube Attain GTC Pro 2016',
				'slug' 			=> 'bicicleta-de-carretera-de-disco-cube-attain-gtc-pro-2016',
				'description' 	=> 'La Attain GTC Pro Disc es sobre comodidad y velocidad. El cuadro de carbono ha sido desarrollado para aumentar la comodidad y reducir la fatiga en marchas largas. Por supuesto, esto no significa una pérdida de velocidad. Lo último en tecnología de freno de disco es una gran adición, proporcionando una gran potencia de frenado en todas las condiciones climáticas. Un tubo diagonal de alto volumen, combinado con un eje de pedalier PressFit y tubo de dirección cónico aseguran que no se pierda nada de tu energía.',
				'extract' 		=> 'La Attain GTC Pro Disc es sobre comodidad y velocidad.',
				'price' 		=> 1235.99,
				'image' 		=> 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod141418_IMGSET?wid=500&hei=505',
				'visible' 		=> 1,
				'created_at' 	=> new DateTime,
				'updated_at' 	=> new DateTime,
				'category_id' 	=> 1
			],
			[
				'name' 			=> 'Bicicleta de carretera De Rosa Planet Athena 2016',
				'slug' 			=> 'bicicleta-de-carretera-de-rosa-planet-athena-2016',
				'description' 	=> 'With all round geometry and unidirectional super high-modulus carbon frame and fork, combined with Campagnolo Athena 11 speed groupset the De Rosa Planet is an amazing looking road bike ready to attack the local races and sportives.',
				'extract' 		=> 'the De Rosa Planet is an amazing looking road bike ready to attack the local races and sportives.',
				'price' 		=> 2898.49,
				'image' 		=> 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod148153_IMGSET?wid=500&hei=505',
				'visible' 		=> 1,
				'created_at' 	=> new DateTime,
				'updated_at' 	=> new DateTime,
				'category_id' 	=> 1
			],
			[
				'name' 			=> 'Bicicleta de carretera Cube Litening C:62 2016',
				'slug' 			=> 'bicicleta-de-carretera-cube-litening-c-62-2016',
				'description' 	=> 'Con un cuadro de carbono superligero C:62 con enrutamiento interno de cables y grupo Shimano Ultegra, la Litening C:62 es una bici lista para la competición que es excepcionalmente rápida y ligera. La gran apariencia es igualada por su gran rendimiento, con una conducción que es más ligera, más rígida y más cómoda. La nueva horquilla completa de carbono C:62 con botellas super delgadas y aerodinámicas, combina máxima precisión de dirección con la mejor absorción posible de las vibraciones.',
				'extract' 		=> 'combina máxima precisión de dirección con la mejor absorción posible de las vibraciones',
				'price' 		=> 1799.99,
				'image' 		=> 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod141430_IMGSET?wid=500&hei=505',
				'visible' 		=> 1,
				'created_at' 	=> new DateTime,
				'updated_at' 	=> new DateTime,
				'category_id' 	=> 1
			],
			[
				'name' 			=> 'Bicicleta rígida Vitus Bikes Sentier VRS - SLX 1x11 2017',
				'slug' 			=> 'bicicleta-rigida-vitus-bikes-sentier-vrs-slx-1x11-2017',
				'description' 	=> '¡La gama Sentier de bicis rígidas de trail sigue inspirando y pide ser empujada a los límites! Desde singletrack en bosques a asaltos de bike park, ¡la gama Sentier ha estado diseñada con aventuras rápidas llenas de acción en mente! ¡Nuestro cuadro de aluminio 6061-T6 triconificado y superligero se ha combinado con un paquete de componentes de alto rendimiento para asegurar que la Sentier VRS rinda en todos los frentes! La Sentier VRS cuenta con un paquete de componentes de alto rendimiento que consta de una horquilla RockShox Sektor Silver, cambios Shimano SLX con bielas RaceFace, frenos hidráulicos de disco con un juego de ruedas WTB/Novatec y un kit de acabado Vitus para completar el paquete. Nuestra geometría de trail agresiva ha sido diseñada alrededor de ruedas de 27.5” (650b) y una horquilla con 140mm de recorrido. Un tubo de dirección corto y eje de pedalier bajo mantienen el centro de gravedad bajo para proporcionar un manejo mejorado mientras que el tamaño de rueda más grande rueda sobre raíces y rocas con facilidad.',
				'extract' 		=> '¡La gama Sentier de bicis rígidas de trail sigue inspirando y pide ser empujada a los límites!',
				'price' 		=> 1249.00,
				'image' 		=> 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod146561_IMGSET?wid=500&hei=505',
				'visible' 		=> 1,
				'created_at' 	=> new DateTime,
				'updated_at' 	=> new DateTime,
				'category_id' 	=> 2
			],
			[
				'name' 			=> 'Bicicleta rígida Cube Attention 27.5" 2016',
				'slug' 			=> 'bicicleta-rigida-cube-attention-27-5-2016',
				'description' 	=> 'Esta es la Attention - una bici que merece ser colmada de elogios. Basándose en el cuadro de Formación Mecánica Avanzada, los componentes orientados en el rendimiento con 30 marchas que dan a los riders una rígida que es capaz de enfrentarse a cualquier cosa desde largas salidas en senderos a marchas explosivas.',
				'extract' 		=> 'Esta es la Attention - una bici que merece ser colmada de elogios.',
				'price' 		=> 623.99,
				'image' 		=> 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod154507_IMGSET?wid=500&hei=505',
				'visible' 		=> 1,
				'created_at' 	=> new DateTime,
				'updated_at' 	=> new DateTime,
				'category_id' 	=> 2
			],
			[
				'name' 			=> 'Bicicleta rígida Cube Acid 27.5" 2016',
				'slug' 			=> 'bicicleta-rigida-cube-acid-27-5-2016',
				'description' 	=> 'La Acid está llamada así porque puede disolver senderos complicados con facilidad. Un manejo equilibrado pero animado te permite ir a toda velocidad y con grandes características como Shimano I-spec y horquilla de bloqueo remoto Manitou, la Acid está preparada para todas tus aventuras en los trails.',
				'extract' 		=> 'La Acid está llamada así porque puede disolver senderos complicados con facilidad.',
				'price' 		=> 774.99,
				'image' 		=> 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod141169_IMGSET?wid=500&hei=505',
				'visible' 		=> 1,
				'created_at' 	=> new DateTime,
				'updated_at' 	=> new DateTime,
				'category_id' 	=> 2
			]
		);

        DB::table('products')->insert($data);
    }
}
