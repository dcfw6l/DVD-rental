export class ProductService {

public Products =[ 

        { 

            Id: 1, 
            Name: "LG Oled nagyon nagy TV", 
            Image: "https://s12emagst.akamaized.net/products/29100/29099440/images/res_f6612345997a65708987a74442f77fb3_450x450_jda4.jpg", 
            Description: "Lg oled nagyon nagyon nagy TV. Nagyobb mint a szomszédnak.", 
            CategoryId: 1, 
            CategoryName: "Televízió", 
            Count: 10, 
            Currency: "Ft", 
            Price: 450000 

        },
        { 

            Id: 2, 
            Name: "Samsung QLED nagyon nagy TV", 
            Image: "https://s12emagst.akamaized.net/products/29100/29099440/images/res_f6612345997a65708987a74442f77fb3_450x450_jda4.jpg", 
            Description: "Samsung QLED nagyon nagyon nagy TV. Jobb mint az LG.", 
            CategoryId: 1, 
            CategoryName: "Televízió", 
            Count: 45, 
            Currency: "Ft", 
            Price: 449000 

        }, 

        { 

            Id: 3, 
            Name: "Samsung UE55TU7002 Smart LED Televízió", 
            Image: "https://s12emagst.akamaized.net/products/29100/29099440/images/res_f6612345997a65708987a74442f77fb3_450x450_jda4.jpg", 
            Description: "Színek és részletek Éles és élénk színek Crystal Display Merülj el a képben a szélesebb színskálával!", 
            CategoryId: 1, 
            CategoryName: "Televízió", 
            Count: 7, 
            Currency: "Ft", 
            Price: 164900 

        }, 

        { 

            Id: 4, 
            Name: "Samsung UE65TU8002 Smart LED Televízió", 
            Image: "https://s12emagst.akamaized.net/products/29100/29099449/images/res_ba214f7d2da52720af1ea07f7f86aeeb_450x450_ofmo.jpg", 
            Description: "Színek és részletek Éles és élénk színek Crystal Display Merülj el a képben a szélesebb színskálával!", 
            CategoryId: 1, 
            CategoryName: "Televízió", 
            Count: 12, 
            Currency: "Ft", 
            Price: 219900 

        }, 

        { 

            Id: 5, 
            Name: "LG 55UM7450PLA Smart LED", 
            Image: "https://s12emagst.akamaized.net/products/22640/22639079/images/res_5efa756a920647ddc2f97e37cd9cab0a_450x450_379j.jpg", 
            Description: "Színek és részletek Éles és élénk színek Crystal Display Merülj el a képben a szélesebb színskálával!", 
            CategoryId: 1, 
            CategoryName: "Televízió", 
            Count: 30, 
            Currency: "Ft", 
            Price: 154990 

        }, 

        { 

            Id: 6, 
            Name: "Samsung 55Q60R QLED Smart LED LED", 
            Image: "https://s12emagst.akamaized.net/products/20709/20708861/images/res_e8575e92b49ad87e9cebf8a5c7fcae9a_450x450_tjbl.jpg", 
            Description: "Színek és részletek Éles és élénk színek Crystal Display Merülj el a képben a szélesebb színskálával!", 
            CategoryId: 1, 
            CategoryName: "Televízió", 
            Count: 23, 
            Currency: "Ft", 
            Price: 249000 

        }, 

        { 

            Id: 7, 
            Name: "LG 65UM7100PLA LED Smart Televízió", 
            Image: "https://s12emagst.akamaized.net/products/23029/23028040/images/res_2b7969e82eb9b92c35d3cb6b3ef73df4_450x450_n2b6.jpg", 
            Description: "Színek és részletek Éles és élénk színek Crystal Display Merülj el a képben a szélesebb színskálával!", 
            CategoryId: 1, 
            CategoryName: "Televízió", 
            Count: 11, 
            Currency: "Ft", 
            Price: 249000 

        }, 

        { 

            Id: 8, 
            Name: "Samsung 82\" UE82S9WALXXH Ívelt 4K Televízió", 
            Image: "https://s12emagst.akamaized.net/products/8867/8866782/images/res_e1a856dd5310b0c8c35842a93c305bb1_450x450_tqhq.jpg", 
            Description: "Színek és részletek Éles és élénk színek Crystal Display Merülj el a képben a szélesebb színskálával!", 
            CategoryId: 1, 
            CategoryName: "Televízió", 
            Count: 1, 
            Currency: "Ft", 
            Price: 3717040 

        }, 

        { 

            Id: 9, 
            Name: "Samsung UE50TU8002 Smart LED Televízió", 
            Image: "https://s12emagst.akamaized.net/products/29100/29099438/images/res_83b308b548f1d52d1797b4dca71f6411_450x450_6jda.jpg", 
            Description: "Színek és részletek Éles és élénk színek Crystal Display Merülj el a képben a szélesebb színskálával!", 
            CategoryId: 1, 
            CategoryName: "Televízió", 
            Count: 13, 
            Currency: "Ft", 
            Price: 189899 

        }, 

        { 

            Id: 10, 
            Name: "Philips 65PUS6504/12 Smart LED Televízió", 
            Image: "https://s12emagst.akamaized.net/products/23202/23201074/images/res_7981cead7d48558eccd7c5c6f5283b28_450x450_6gvp.jpg", 
            Description: "Színek és részletek Éles és élénk színek Crystal Display Merülj el a képben a szélesebb színskálával!", 
            CategoryId: 1, 
            CategoryName: "Televízió", 
            Count: 4, 
            Currency: "Ft", 
            Price: 168990 

        }, 

        { 

            Id: 11, 
            Name: "Asus X509DJ-BQ121 15.6\"", 
            Image: "https://s12emagst.akamaized.net/products/29182/29181790/images/res_c9fc13342381f85fbf240894711ca5fe_450x450_keka.jpg", 
            Description: "Színek és részletek Éles és élénk színek Crystal Display Merülj el a képben a szélesebb színskálával!", 
            CategoryId: 2, 
            CategoryName: "Notebook", 
            Count: 10, 
            Currency: "Ft", 
            Price: 184990 

        }, 

        { 

            Id: 12, 
            Name: "Lenovo V145 81MT000NHV 15,6\"", 
            Image: "https://s12emagst.akamaized.net/products/22584/22583684/images/res_42f7aa3c4096f9540f78cc8e1044a7b0_450x450_ll85.png", 
            Description: "Színek és részletek Éles és élénk színek Crystal Display Merülj el a képben a szélesebb színskálával!", 
            CategoryId: 2, 
            CategoryName: "Notebook", 
            Count: 8, 
            Currency: "Ft", 
            Price: 84990 

        }, 

        { 

            Id: 13, 
            Name: "Lenovo S145-15IGM 81MX0049HV 15.6\"", 
            Image: "https://s12emagst.akamaized.net/products/24316/24315388/images/res_eebeec16deab03c30aca33eecceb3d54_450x450_u4na.jpg", 
            Description: "Színek és részletek Éles és élénk színek Crystal Display Merülj el a képben a szélesebb színskálával!", 
            CategoryId: 2, 
            CategoryName: "Notebook", 
            Count: 2, 
            Currency: "Ft", 
            Price: 168990 

        }, 

        { 

            Id: 14, 
            Name: "Indesit IWSB 61051 C ECO Elöltöltős", 
            Image: "https://s12emagst.akamaized.net/products/3187/3186857/images/res_d5c5e48c4ee4798ca231e4a8874f917d_full.jpg", 
            Description: "Az Eco Time opció használatával nem kell várnod a teljes adag szennyes összegyűltére. ", 
            CategoryId: 3, 
            CategoryName: "Mosógép", 
            Count: 20, 
            Currency: "Ft", 
            Price: 69990 

        }, 

        { 

            Id: 15, 
            Name: "Samsung DV70M5020QW/LE Hőszivattyús", 
            Image: "https://s12emagst.akamaized.net/products/8688/8687863/images/res_9336ee79a25c721e0e2a422d645b5c03_450x450_u5hd.jpg", 
            Description: "Az Eco Time opció használatával nem kell várnod a teljes adag szennyes összegyűltére. ", 
            CategoryId: 3, 
            CategoryName: "Mosógép", 
            Count: 15, 
            Currency: "Ft", 
            Price: 161900 

        }, 

        { 

            Id: 16, 
            Name: "Star-Light DPV-815A++ Hőszivattyús", 
            Image: "https://s12emagst.akamaized.net/products/19424/19423173/images/res_e0b227ab1e0927de459979a3b4990e61_450x450_l9b7.jpg", 
            Description: "Az Eco Time opció használatával nem kell várnod a teljes adag szennyes összegyűltére. ", 
            CategoryId: 3, 
            CategoryName: "Mosógép", 
            Count: 4, 
            Currency: "Ft", 
            Price: 119900 

        } 
    ];
}