package br.senai.sp.desafio;

import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.TextView;


public class MainActivity extends ActionBarActivity {


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
