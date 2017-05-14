package com.example.usuario.imagens;

import android.app.Activity;
import android.media.Image;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.TextView;
//@author : Ramon Lacava 3it 
//Aplicação feita com o intuito de mostrar como funciona os scrolls horizontais , 
//imagebuttons , views e outros
//Para se fazer o scroll horizontal e necessário colocar um layout dentro da horizontalscroll e assim 
//é possivel colocar os imagebuttons dentro da horizontal scroll
//nenhum erro ocorreu durante o projeto , apenas a renomeação na qual foi necessária colocar/
//os nomes das imagens em minusculo

public class MainActivity extends Activity {
	//aqui é pego as ids das imagebuttons views e da textview
    public void Clique(View view1){
        ImageButton z = (ImageButton) findViewById(R.id.imageButton);
        ImageButton x = (ImageButton) findViewById(R.id.imageButton2);
        ImageButton c = (ImageButton) findViewById(R.id.imageButton3);
        ImageButton v = (ImageButton) findViewById(R.id.imageButton4);
        ImageButton b = (ImageButton) findViewById(R.id.imageButton5);
        ImageButton n = (ImageButton) findViewById(R.id.imageButton6);
        ImageButton m = (ImageButton) findViewById(R.id.imageButton7);
        ImageButton l = (ImageButton) findViewById(R.id.imageButton8);
        ImageView t = (ImageView)findViewById(R.id.img);
        TextView a = (TextView)findViewById(R.id.texto);
		//apos isso é declarado uma boolean para checar se o botão foi pressionado
		//se ele for pressionado ele irá setar um texto na text view e uma imagem atraves do imageresource
		//foi colocado uma onclick action para que o sistema funcione corretamente
        boolean checa = ((ImageButton) view1).isPressed();
        switch(view1.getId()) {
            case R.id.imageButton:
                if (checa) {
                    t.setImageResource(R.drawable.a);
                    a.setText("Imagem de Deserto");
                }
                break;
            case R.id.imageButton2:
                if (checa) {
                    t.setImageResource(R.drawable.b);
                    a.setText("Imagem de Flor");
                }
                break;
            case R.id.imageButton3:
                if (checa) {
                    t.setImageResource(R.drawable.c);
                    a.setText("Imagem de Agua-Viva");
                }
                break;
            case R.id.imageButton4:
                if (checa) {
                    t.setImageResource(R.drawable.d);
                    a.setText("Imagem de Agua-Viva");
                }
                break;
            case R.id.imageButton5:
                if (checa) {
                    t.setImageResource(R.drawable.e);
                    a.setText("Imagem de Agua-Viva");
                }
                break;
            case R.id.imageButton6:
                if (checa) {
                    t.setImageResource(R.drawable.f);
                    a.setText("Imagem de Agua-Viva");
                }
                break;
            case R.id.imageButton7:
                if (checa) {
                    t.setImageResource(R.drawable.g);
                    a.setText("Imagem de Agua-Viva");
                }
                break;
            case R.id.imageButton8:
                if (checa) {
                    t.setImageResource(R.drawable.h);
                    a.setText("Imagem de Agua-Viva");
                }
                break;
        }

    }
	//o onradio é responsavel por fazer a troca entre a ação dos botões

    public void onRadioButtonClicked(View view) {
        TextView a = (TextView)findViewById(R.id.texto);
        boolean checked = ((RadioButton) view).isChecked();
        ImageView t = (ImageView)findViewById(R.id.img);


        switch(view.getId()) {
            case R.id.r1:
                if (checked) {
                    t.setImageResource(R.drawable.a);
                    a.setText("Imagem de Deserto");
                }
                break;
            case R.id.r2:
                if (checked) {
                    t.setImageResource(R.drawable.b);
                    a.setText("Imagem de Flor");
                }
                break;
            case R.id.r3:
                if (checked) {
                    t.setImageResource(R.drawable.c);
                    a.setText("Imagem de Agua-Viva");
                }
                break;
        }
    }


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
