package br.senai.sp.aplicacao2;

import android.app.AlertDialog;
import android.content.Intent;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.SeekBar;

import java.util.List;


public class formulario extends ActionBarActivity {
    private FormularioAssistente assistente;




    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_formulario);
        assistente = new FormularioAssistente(this);

        Button botao = (Button) findViewById(R.id.button);
        Button voltar = (Button) findViewById(R.id.button4);

        voltar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent voltar = new Intent(formulario.this,MainActivity.class);
                startActivity(voltar);
            }
        });



        botao.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //melhorar para mostrar o nome
                cliente cliente = assistente.pegaClienteFormulario();
                ClienteDao daoc = new ClienteDao(formulario.this);
                daoc.insere(cliente);

                daoc.close();
                finish();
                //usando antes de implementar o metodo de inserção dao
                //Toast.makeText(formulario.this , "Clicando no botão inserir" , Toast.make();
                //finish();
            }
        });
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_formulario, menu);
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
