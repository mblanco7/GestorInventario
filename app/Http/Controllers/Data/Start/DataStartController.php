<?php

namespace App\Http\Controllers\Data\Start;

use App\Http\Controllers\Controller;
use App\Models\FireBase\Entities\InvCategoria;
use App\Models\FireBase\Entities\InvColor;
use App\Models\FireBase\Entities\InvMarca;
use App\Models\FireBase\Entities\InvProducto;
use App\Models\FireBase\Entities\InvTalla;
use App\Services\FireBase\ArqPerfilesService;
use App\Services\FireBase\ArqRolesPerfilesService;
use App\Services\FireBase\ArqRolesService;
use App\Services\FireBase\ArqUsuariosService;
use App\Services\FireBase\InvBodegasService;
use App\Services\FireBase\InvCategoriasService;
use App\Services\FireBase\InvColoresService;
use App\Services\FireBase\InvEstantesService;
use App\Services\FireBase\InvMarcasService;
use App\Services\FireBase\InvPasillosService;
use App\Services\FireBase\InvPisosService;
use App\Services\FireBase\InvProductosService;
use App\Services\FireBase\InvPuestosService;
use App\Services\FireBase\InvTallasService;

class DataStartController extends Controller {

    private ArqPerfilesService $arqPerfilesService;
    private ArqRolesPerfilesService $arqRolesPerfilesService;
    private ArqRolesService $arqRolesService;
    private ArqUsuariosService $arqUsuariosService;
    private InvBodegasService $invBodegasService;
    private InvCategoriasService $invCategoriasService;
    private InvColoresService $invColoresService;
    private InvEstantesService $invEstantesService;
    private InvMarcasService $invMarcasService;
    private InvPasillosService $invPasillosService;
    private InvPisosService $invPisosService;
    private InvProductosService $invProductosService;
    private InvPuestosService $invPuestosService;
    private InvTallasService $invTallasService;

    public function __construct(
        ArqPerfilesService $arqPerfilesService,
        ArqRolesPerfilesService $arqRolesPerfilesService,
        ArqRolesService $arqRolesService,
        ArqUsuariosService $arqUsuariosService,
        InvBodegasService $invBodegasService,
        InvCategoriasService $invCategoriasService,
        InvColoresService $invColoresService,
        InvEstantesService $invEstantesService,
        InvMarcasService $invMarcasService,
        InvPasillosService $invPasillosService,
        InvPisosService $invPisosService,
        InvProductosService $invProductosService,
        InvPuestosService $invPuestosService,
        InvTallasService $invTallasService,
    ) {
        $this->arqPerfilesService = $arqPerfilesService;
        $this->arqRolesPerfilesService = $arqRolesPerfilesService;
        $this->arqRolesService = $arqRolesService;
        $this->arqUsuariosService = $arqUsuariosService;
        $this->invBodegasService = $invBodegasService;
        $this->invCategoriasService = $invCategoriasService;
        $this->invColoresService = $invColoresService;
        $this->invEstantesService = $invEstantesService;
        $this->invMarcasService = $invMarcasService;
        $this->invPasillosService = $invPasillosService;
        $this->invPisosService = $invPisosService;
        $this->invProductosService = $invProductosService;
        $this->invPuestosService = $invPuestosService;
        $this->invTallasService = $invTallasService;
    }

    public function seed() {
        //Categorias
        $cid1 = $this->invCategoriasService->save(new InvCategoria([
            "codigo"=> "01",
            "nombre"=> "HOMBRES",
            "descripcion"=> "Prendas de Hombre",
            "padre"=> null,
            "activo"=> true
        ]));
        print('$cid1');
            $cid11 = $this->invCategoriasService->save(new InvCategoria([
                "codigo"=> "01010",
                "nombre"=> "Pantalones",
                "descripcion"=> "Prendas formales y semiformales para cubrir piernas",
                "padre"=> $cid1,
                "activo"=> true
            ]));
            print('$cid11');
                $cid111 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "01011",
                    "nombre"=> "Sudaderas y Joggers",
                    "descripcion"=> "Prendas deportivas para cubrir piernas",
                    "padre"=> $cid11,
                    "activo"=> true
                ]));
                print('$cid111');
                $cid112 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "01012",
                    "nombre"=> "Pantalonetas y Bermudas",
                    "descripcion"=> "Prendas cortas para cubrir piernas",
                    "padre"=> $cid11,
                    "activo"=> true
                ]));
                print('$cid112');
                $cid113 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "01013",
                    "nombre"=> "Licras",
                    "descripcion"=> "Prendas ajustadas para cubrir piernas",
                    "padre"=> $cid11,
                    "activo"=> true
                ]));
                print('$cid113');
            $cid12 = $this->invCategoriasService->save(new InvCategoria([
                "codigo"=> "01020",
                "nombre"=> "Camisas",
                "descripcion"=> "Prendas formales y semiformales para cubrir la parte superior del cuerpo",
                "padre"=> $cid1,
                "activo"=> true
            ]));
            print('$cid12');
                $cid121 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "01021",
                    "nombre"=> "Camisas Manga Larga",
                    "descripcion"=> "Prendas formales para cubrir la parte superior del cuerpo",
                    "padre"=> $cid12,
                    "activo"=> true
                ]));
                print('$cid121');
                $cid122 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "01022",
                    "nombre"=> "Camisas Manga Corta",
                    "descripcion"=> "Prendas informales para cubrir la parte superior del cuerpo",
                    "padre"=> $cid12,
                    "activo"=> true
                ]));
                print('$cid122');
            $cid13 = $this->invCategoriasService->save(new InvCategoria([
                "codigo"=> "01030",
                "nombre"=> "Camisetas",
                "descripcion"=> "Prendas informal para cubrir la parte superior del cuerpo",
                "padre"=> $cid1,
                "activo"=> true
            ]));
            print('$cid13');
                $cid131 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "01031",
                    "nombre"=> "Camisetas Manga Larga",
                    "descripcion"=> "Prendas informal para cubrir la parte superior del cuerpo",
                    "padre"=> $cid13,
                    "activo"=> true
                ]));
                print('$cid131');
                $cid132 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "01032",
                    "nombre"=> "Camisetas Manga Corta",
                    "descripcion"=> "Prendas informal para cubrir la parte superior del cuerpo",
                    "padre"=> $cid13,
                    "activo"=> true
                ]));
                print('$cid132');
                $cid133 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "01033",
                    "nombre"=> "Camisetas Manga Siza",
                    "descripcion"=> "Prendas informal para cubrir la parte superior del cuerpo",
                    "padre"=> $cid13,
                    "activo"=> true
                ]));
                print('$cid133');
                $cid134 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "01034",
                    "nombre"=> "Camisetas Esqueleto",
                    "descripcion"=> "Prendas informal para cubrir la parte superior del cuerpo",
                    "padre"=> $cid13,
                    "activo"=> true
                ]));
                print('$cid134');
            $cid14 = $this->invCategoriasService->save(new InvCategoria([
                "codigo"=> "01040",
                "nombre"=> "Polos",
                "descripcion"=> "Prendas semiformal para cubrir la parte superior del cuerpo",
                "padre"=> $cid1,
                "activo"=> true
            ]));
            print('$cid14');
            $cid15 = $this->invCategoriasService->save(new InvCategoria([
                "codigo"=> "01050",
                "nombre"=> "Calzado",
                "descripcion"=> "Calzado",
                "padre"=> $cid1,
                "activo"=> true
            ]));
            print('$cid15');
            $cid16 = $this->invCategoriasService->save(new InvCategoria([
                "codigo"=> "01060",
                "nombre"=> "Accesorios",
                "descripcion"=> "Accesorios",
                "padre"=> $cid1,
                "activo"=> true
            ]));
            print('$cid16');
        $cid2 = $this->invCategoriasService->save(new InvCategoria([
            "codigo"=> "02",
            "nombre"=> "MUJERES",
            "descripcion"=> "Prendas de Mujeres",
            "padre"=> null,
            "activo"=> true
        ]));
        print('$cid2');
            $cid21 = $this->invCategoriasService->save(new InvCategoria([
                "codigo"=> "02010",
                "nombre"=> "Pantalones",
                "descripcion"=> "Prendas formales y semiformales para cubrir piernas",
                "padre"=> $cid2,
                "activo"=> true
            ]));
            print('$cid21');
                $cid211 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "02011",
                    "nombre"=> "Sudaderas y Joggers",
                    "descripcion"=> "Prendas deportivas para cubrir piernas",
                    "padre"=> $cid21,
                    "activo"=> true
                ]));
                print('$cid211');
                $cid212 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "02012",
                    "nombre"=> "Pantalonetas y Bermudas",
                    "descripcion"=> "Prendas cortas para cubrir piernas",
                    "padre"=> $cid21,
                    "activo"=> true
                ]));
                print('$cid212');
                $cid213 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "02013",
                    "nombre"=> "Leggins",
                    "descripcion"=> "Prendas ajustadas para cubrir piernas",
                    "padre"=> $cid21,
                    "activo"=> true
                ]));
                print('$cid213');
                $cid214 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "02014",
                    "nombre"=> "Licras",
                    "descripcion"=> "Prendas ajustadas para cubrir piernas",
                    "padre"=> $cid21,
                    "activo"=> true
                ]));
                print('$cid214');
            $cid22 = $this->invCategoriasService->save(new InvCategoria([
                "codigo"=> "02020",
                "nombre"=> "Camisas",
                "descripcion"=> "Prendas formales y semiformales para cubrir la parte superior del cuerpo",
                "padre"=> $cid2,
                "activo"=> true
            ]));
            print('$cid22');
            $cid221 = $this->invCategoriasService->save(new InvCategoria([
                "codigo"=> "02021",
                "nombre"=> "Camisas Manga Larga",
                "descripcion"=> "Prendas formales para cubrir la parte superior del cuerpo",
                "padre"=> $cid22,
                "activo"=> true
            ]));
            print('$cid221');
            $cid222 = $this->invCategoriasService->save(new InvCategoria([
                "codigo"=> "02022",
                "nombre"=> "Camisas Manga Corta",
                "descripcion"=> "Prendas informales para cubrir la parte superior del cuerpo",
                "padre"=> $cid22,
                "activo"=> true
            ]));
            print('$cid222');
            $cid23 = $this->invCategoriasService->save(new InvCategoria([
                "codigo"=> "02030",
                "nombre"=> "Camisetas",
                "descripcion"=> "Prendas informal para cubrir la parte superior del cuerpo",
                "padre"=> $cid2,
                "activo"=> true
            ]));
            print('$cid23');
                $cid231 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "02031",
                    "nombre"=> "Camisetas Manga Larga",
                    "descripcion"=> "Prendas informal para cubrir la parte superior del cuerpo",
                    "padre"=> $cid23,
                    "activo"=> true
                ]));
                print('$cid231');
                $cid232 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "02032",
                    "nombre"=> "Camisetas Manga Corta",
                    "descripcion"=> "Prendas informal para cubrir la parte superior del cuerpo",
                    "padre"=> $cid23,
                    "activo"=> true
                ]));
                print('$cid232');
                $cid233 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "02033",
                    "nombre"=> "Camisetas Manga Siza",
                    "descripcion"=> "Prendas informal para cubrir la parte superior del cuerpo",
                    "padre"=> $cid23,
                    "activo"=> true
                ]));
                print('$cid233');
                $cid234 = $this->invCategoriasService->save(new InvCategoria([
                    "codigo"=> "02034",
                    "nombre"=> "Camisetas Esqueleto",
                    "descripcion"=> "Prendas informal para cubrir la parte superior del cuerpo",
                    "padre"=> $cid23,
                    "activo"=> true
                ]));
                print('$cid234');
            $cid24 = $this->invCategoriasService->save(new InvCategoria([
                "codigo"=> "02040",
                "nombre"=> "Polos",
                "descripcion"=> "Prendas semiformal para cubrir la parte superior del cuerpo",
                "padre"=> $cid2,
                "activo"=> true
            ]));
            print('$cid24');
            $cid25 = $this->invCategoriasService->save(new InvCategoria([
                "codigo"=> "02050",
                "nombre"=> "Calzado",
                "descripcion"=> "Calzado",
                "padre"=> $cid2,
                "activo"=> true
            ]));
            print('$cid25');
            $cid26 = $this->invCategoriasService->save(new InvCategoria([
                "codigo"=> "02060",
                "nombre"=> "Accesorios",
                "descripcion"=> "Accesorios",
                "padre"=> $cid2,
                "activo"=> true
            ]));
            print('$cid26');

        //Marcas
        $ADIDAS = $this->invMarcasService->save(new InvMarca([
            "codigo" => "ADIDAS",
            "nombre" => "Adidas",
            "descripcion" => "Adidas",
            "activo" => true
        ]));
        print('$ADIDAS');
        $NIKE = $this->invMarcasService->save(new InvMarca([
            "codigo" => "NIKE",
            "nombre" => "Nike",
            "descripcion" => "Nike",
            "activo" => true
        ]));
        print('$NIKE');
        $REEBOK = $this->invMarcasService->save(new InvMarca([
            "codigo" => "REEBOK",
            "nombre" => "Reebok",
            "descripcion" => "Reebok",
            "activo" => true
        ]));
        print('$REEBOK');
        $UNDERARMOUR = $this->invMarcasService->save(new InvMarca([
            "codigo" => "UNDERARMOUR",
            "nombre" => "UnderArmour",
            "descripcion" => "UnderArmour",
            "activo" => true
        ]));
        print('$UNDERARMOUR');
        $ASICS = $this->invMarcasService->save(new InvMarca([
            "codigo" => "ASICS",
            "nombre" => "Asics",
            "descripcion" => "Asics",
            "activo" => true
        ]));
        print('$ASICS');
        $PUMA = $this->invMarcasService->save(new InvMarca([
            "codigo" => "PUMA",
            "nombre" => "Puma",
            "descripcion" => "Puma",
            "activo" => true
        ]));
        print('$PUMA');
        $PUMA = $this->invMarcasService->save(new InvMarca([
            "codigo" => "PUMA",
            "nombre" => "Puma",
            "descripcion" => "Puma",
            "activo" => true
        ]));
        print('$PUMA');
        $NB = $this->invMarcasService->save(new InvMarca([
            "codigo" => "NB",
            "nombre" => "NB",
            "descripcion" => "NB",
            "activo" => true
        ]));
        print('$NB');
        $COLUMBIA = $this->invMarcasService->save(new InvMarca([
            "codigo" => "COLUMBIA",
            "nombre" => "Columbia",
            "descripcion" => "Columbia",
            "activo" => true
        ]));
        print('$COLUMBIA');

        //Productos
        $pid1 = $this->invProductosService->save(new InvProducto([
            "codigo" => "ACTIVE",
            "nombre" => "Active",
            "descripcion" => "Tejido elástico súper suave y ultra agarre para una comodidad y apoyo óptimos.",
            "caracteristicas" => "75 % poliéster, 25 % elastano",
            "marca" => $REEBOK,
            "categoria" => $cid213,
            "activo" => 1,
        ]));
        print('$pid1');
        $pid2 = $this->invProductosService->save(new InvProducto([
            "codigo" => "AIRATHLETIC",
            "nombre" => "Air Athletic",
            "descripcion" => "Diseño de cojín de aire: los tenis para correr utilizan un diseño de amortiguación de aire, proporcionan amortiguación y efecto de apoyo para los pies. Proporcionan más protección entre los pies y las rodillas y permiten una experiencia cómoda al caminar.",
            "caracteristicas" => "Suela de Goma",
            "marca" => $COLUMBIA,
            "categoria" => $cid15,
            "activo" => 1,
        ]));
        print('$pid2');
        $pid3 = $this->invProductosService->save(new InvProducto([
            "codigo" => "ALSTAN",
            "nombre" => "Alstan",
            "descripcion" => "Fabricado con algodón de BCI: Al comprar productos de algodón de PUMA, estás apoyando la agricultura de algodón más sostenible a través de la iniciativa Better Cotton Disponible en tallas grandes.",
            "caracteristicas" => "100% poliéster",
            "marca" => $PUMA,
            "categoria" => $cid11,
            "activo" => 1,
        ]));
        print('$pid3');
        $pid4 = $this->invProductosService->save(new InvProducto([
            "codigo" => "EVOSTRIPE",
            "nombre" => "Evostripe",
            "descripcion" => "Pantalones de ejercicio versátiles para mujer: los pantalones de rendimiento de Incrediwear son una ropa deportiva superior que cuenta con material transpirable que absorbe la humedad con un elástico en 4 direcciones. Su versatilidad los hace ideales para llevar como pantalones de yoga y leggings de correr para mejorar tu rendimiento y después del entrenamiento para optimizar la recuperación.",
            "caracteristicas" => "Lycra",
            "marca" => $PUMA,
            "categoria" => $cid21,
            "activo" => 1,
        ]));
        print('$pid4');

        //Tallas
        $tallas = ["XXS", "XS", "S", "M", "L", "XL", "XXL", "XXXL", "XXXXL", "5", "5.5", "6", "6.5", "7",
        "7.5", "8", "8.5", "9", "9.5", "10", "10.5", "11", "11.5", "12", "13", "14", "15", "16", "26", "28",
        "30", "32", "34", "36", "38", "40", "41", "42",];
        foreach ($tallas as $talla) {
            $this->invTallasService->save(new InvTalla([
                "codigo" => $talla, "activo" => 1
            ]));
            print("t".$talla);
        }

        $colores = ["#F0F8FF" => "Alice azul", "#FAEBD7" => "Blanco antiguo", "#00FFFF" => "Agua", "#7FFFD4" => "Aguamarina", "#F0FFFF" => "Azur",
        "#F5F5DC" => "Beige", "#FFE4C4" => "Sopa de mariscos", "#000000" => "Negro", "#FFEBCD" => "BlanqueadoAlmendra", "#0000FF" => "Azul",
        "#8A2BE2" => "Violeta Azul", "#A52A2A" => "Marrón", "#DEB887" => "madera corpulenta", "#5F9EA0" => "cadeteazul", "#7FFF00" => "Monasterio",
        "#D2691E" => "Chocolate", "#FF7F50" => "Coral", "#6495ED" => "AcianoAzul", "#FFF8DC" => "Seda de maiz", "#DC143C" => "carmesí",
        "#00FFFF" => "cian", "#00008B" => "Azul oscuro", "#008B8B" => "cian oscuro", "#B8860B" => "DarkGoldenRod", "#A9A9A9" => "Gris oscuro",
        "#A9A9A9" => "Gris oscuro", "#006400" => "Verde oscuro", "#BDB76B" => "caqui oscuro", "#8B008B" => "Magenta oscuro", "#556B2F" => "OscuroOlivaVerde",
        "#FF8C00" => "Naranja oscuro", "#9932CC" => "Orquídea Oscura", "#8B0000" => "Rojo oscuro", "#E9967A" => "salmón oscuro", "#8FBC8F" => "oscuromarverde",
        "#483D8B" => "DarkSlateBlue", "#2F4F4F" => "oscurogris pizarra", "#2F4F4F" => "DarkSlateGrey", "#00CED1" => "turquesa oscuro", "#9400D3" => "Violeta oscuro",
        "#FF1493" => "Rosa profundo", "#00BFFF" => "azul cieloprofundo", "#696969" => "DimGray", "#696969" => "Gris tenue", "#1E90FF" => "DodgerBlue",
        "#B22222" => "Ladrillo refractario", "#FFFAF0" => "FloralBlanco", "#228B22" => "Bosque verde", "#FF00FF" => "Fucsia", "#DCDCDC" => "Gainsboro",
        "#F8F8FF" => "FantasmaBlanco", "#FFD700" => "Oro", "#DAA520" => "vara de oro", "#808080" => "Gris", "#808080" => "Gris", "#008000" => "Verde",
        "#ADFF2F" => "Verde amarillo", "#F0FFF0" => "Gotas de miel", "#FF69B4" => "Rosa caliente", "#CD5C5C" => "IndioRojo", "#4B0082" => "Índigo",
        "#FFFFF0" => "Marfil", "#F0E68C" => "Caqui", "#E6E6FA" => "Lavanda", "#FFF0F5" => "lavandarubor", "#7CFC00" => "CéspedVerde", "#FFFACD" => "limóngasa",
        "#ADD8E6" => "Azul claro", "#F08080" => "coral claro", "#E0FFFF" => "Cian claro", "#FAFAD2" => "LuzOroRodAmarillo", "#D3D3D3" => "Gris claro",
        "#D3D3D3" => "gris claro", "#90EE90" => "Verde claro", "#FFB6C1" => "Rosa claro", "#FFA07A" => "Salmón claro", "#20B2AA" => "luzmarverde",
        "#87CEFA" => "LuzCieloAzul", "#778899" => "Gris Pizarra Claro", "#778899" => "gris pizarra claro", "#B0C4DE" => "LightSteelAzul", "#FFFFE0" => "Amarillo claro",
        "#00FF00" => "Lima", "#32CD32" => "Verde lima", "#FAF0E6" => "Lino", "#FF00FF" => "Magenta", "#800000" => "Granate", "#66CDAA" => "MedioAquaMarine",
        "#0000CD" => "Azul medio", "#BA55D3" => "MedianaOrquídea", "#9370DB" => "Púrpura Medio", "#3CB371" => "MedioMarVerde", "#7B68EE" => "MedioPizarraAzul",
        "#00FA9A" => "MedioPrimaveraVerde", "#48D1CC" => "Turquesa Medio", "#C71585" => "MedioVioletaRojo", "#191970" => "azul medianoche", "#F5FFFA" => "mentacrema",
        "#FFE4E1" => "MistyRose", "#FFE4B5" => "Mocasín", "#FFDAD" => "NavajoBlanco", "#000080" => "Armada", "#FDF5E6" => "AntiguoEncaje", "#808000" => "Aceituna",
        "#6B8E23" => "Verde oliva", "#FFA500" => "Naranja", "#FF4500" => "Rojo naranja", "#DA70D6" => "Orquídea", "#EEE8AA" => "PaleGoldenRod",
        "#98FB98" => "Verde pálido", "#AFEEEE" => "Turquesa pálido", "#DB7093" => "PálidoVioletaRojo", "#FFEFD5" => "PapayaLátigo", "#FFDAB9" => "PeachPuff",
        "#CD853F" => "Perú", "#FFC0CB" => "Rosado", "#DDA0DD" => "Ciruela", "#B0E0E6" => "Azul pálido", "#800080" => "Violeta", "#663399" => "RebeccaPúrpura",
        "#FF0000" => "Rojo", "#BC8F8F" => "RosyBrown", "#4169E1" => "Azul real", "#8B4513" => "SillínMarrón", "#FA8072" => "Salmón", "#F4A460" => "SandyBrown",
        "#2E8B57" => "Mar verde", "#FFF5EE" => "Concha", "#A0522D" => "Tierra de siena", "#C0C0C0" => "Plata", "#87CEEB" => "Cielo azul", "#6A5ACD" => "PizarraAzul",
        "#708090" => "Gris Pizarra", "#708090" => "Pizarra gris", "#FFFAFA" => "Nieve", "#00FF7F" => "Primavera verde", "#4682B4" => "Azul acero",
        "#D2B48C" => "Broncearse", "#008080" => "verde azulado", "#D8BFD8" => "Cardo", "#FF6347" => "Tomate", "#40E0D0" => "Turquesa", "#EE82EE" => "Violeta",
        "#F5DEB3" => "Trigo", "#FFFFFF" => "Blanco", "#F5F5F5" => "Humo blanco", "#FFFF00" => "Amarillo", "#9ACD32" => "Amarillo verde",];

        foreach ($colores as $codigo => $color) {
            $this->invColoresService->save(new InvColor([
                "codigo" => $codigo, "nombre" => $color, "activo" => 1
            ]));
            print("c".$codigo);
        }

    }    

}