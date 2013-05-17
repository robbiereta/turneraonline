<?php
/* Clinicas Test cases generated on: 2012-01-11 19:08:59 : 1326319739*/
App::uses('ClinicasController', 'Controller');

/**
 * TestClinicasController
 */
class TestClinicasController extends ClinicasController {
    /**
     * Auto render
     *
     * @var boolean
     */
    public $autoRender = false;

    /**
     * Redirect action
     *
     * @param mixed $url
     * @param mixed $status
     * @param boolean $exit
     * @return void
     */
    public function redirect($url, $status = null, $exit = true) {
        $this->redirectUrl = $url;
    }
}

/**
 * ClinicasController Test Case
 *
 */
class ClinicasControllerTestCase extends ControllerTestCase {
    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array( 'app.clinica', 'app.consultorio', 'app.medico', 'app.secretaria', 'app.usuario' );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();

        $this->Clinicas = new TestClinicasController();
        $this->Clinicas->constructClasses();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Clinicas);

        parent::tearDown();
    }

    /**
     * testIndex method
     * Verifica que tenga la variable seteada
     * y que la variable no tenga datos recursivos innecesarios
     * @return void
     */
    public function testIndex() {
        $this->testAction( '/clinicas/index' );
        $this->assertInternalType( 'array', $this->vars['clinicas'], 'La vista no tiene definido su listado' );
        $this->assertNotEqual( count( $this->vars['clinicas'] ), 0, 'No hay ninguna clínica activa' );
        foreach( $this->vars['clinicas'] as $clinica ) {
            $this->assertNotEqual( array_key_exists( 'Medicos', $clinica ), true, 'El listado de clinicas posee los médicos relacionados' );
            $this->assertNotEqual( array_key_exists( 'Secretarias', $clinica ), true, 'El listado de clinicas posee los médicos relacionados' );
            $this->assertNotEqual( array_key_exists( 'Consultorios', $clinica ), true, 'El listado de clinicas posee los médicos relacionados' );
            //$this->assertNotEqual( $clinica['Clinica']['publicado'], false, 'El listado está mostrando una clinica no publicada' );
        }
    }

    /**
     * testView method
     *
     * @return void
     */
    public function testView() {
        //$result = $this->testAction( '/clinicas/view/1' );
        /*$this->assertInternalType( 'array', $this->vars['clinicas'], 'La vista no tiene definido su listado' );
        $this->assertNotEqual( count( $this->vars['clinicas'] ), 0, 'No hay ninguna clínica activa' );
        foreach( $this->vars['clinicas'] as $clinica ) {
            $this->assertNotEqual( array_key_exists( 'Medicos', $clinica ), true, 'El listado de clinicas posee los médicos relacionados' );
            $this->assertNotEqual( array_key_exists( 'Secretarias', $clinica ), true, 'El listado de clinicas posee los médicos relacionados' );
            $this->assertNotEqual( array_key_exists( 'Consultorios', $clinica ), true, 'El listado de clinicas posee los médicos relacionados' );
            //$this->assertNotEqual( $clinica['Clinica']['publicado'], false, 'El listado está mostrando una clinica no publicada' );
        }*/
    }

    /**
     * testAdd method
     *
     * @return void
     */
    public function testAdd() {

    }

    /**
     * testEdit method
     *
     * @return void
     */
    public function testEdit() {

    }

    /**
     * testDelete method
     *
     * @return void
     */
    public function testDelete() {

    }

    /**
     * testAdministracionIndex method
     *
     * @return void
     */
    public function testAdministracionIndex() {

    }

    /**
     * testAdministracionView method
     *
     * @return void
     */
    public function testAdministracionView() {

    }

    /**
     * testAdministracionAdd method
     *
     * @return void
     */
    public function testAdministracionAdd() {

    }

    /**
     * testAdministracionEdit method
     *
     * @return void
     */
    public function testAdministracionEdit() {

    }

    /**
     * testAdministracionDelete method
     *
     * @return void
     */
    public function testAdministracionDelete() {

    }

}
