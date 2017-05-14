package com.example.usuario.calculo;

import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;


public class MainActivity extends ActionBarActivity {
    private EditText nota1;
    private EditText nota2;
    private EditText nota3;
    private EditText nota4;
    private EditText media;
    private Button botao;
    private double media1;
    private double n1 , n2,n3,n4;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        nota1 = (EditText) findViewById(R.id.nota1);
        nota2 = (EditText) findViewById(R.id.nota2);
        nota3 = (EditText) findViewById(R.id.nota3);
        nota4 = (EditText) findViewById(R.id.nota4);
        botao = (Button) findViewById(R.id.botao);
        media = (EditText) findViewById(R.id.media);
        try {
            n1 = Double.parseDouble(nota1.getText().toString());
            n2 = Double.parseDouble(nota2.getText().toString());
            n3 = Double.parseDouble(nota3.getText().toString());
            n4 = Double.parseDouble(nota4.getText().toString());
        }catch(NumberFormatException e)
        {

        }
        media1 = (n1+n2+n3+n4)/4;
        final String media2 = String.valueOf(media1);


        botao.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                media.setText(""+media2);
            }
        });




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
