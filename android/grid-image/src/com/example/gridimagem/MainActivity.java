package com.example.gridimagem;

import android.app.Activity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageView;
import android.widget.Toast;


public class MainActivity extends Activity {
	ImageView im1,im2,im3,im4,im5,im6;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        im1 = (ImageView) findViewById(R.id.img00);
        im2 = (ImageView) findViewById(R.id.img01);
        im3 = (ImageView) findViewById(R.id.img02);
        im4 = (ImageView) findViewById(R.id.img10);
        im5 = (ImageView) findViewById(R.id.img11);
        im6 = (ImageView) findViewById(R.id.img12);
    }
    
    public void Verifica(View v){
    	switch (v.getId()) {
		case R.id.img00:
			Toast.makeText(MainActivity.this, "Clicou no 1",Toast.LENGTH_SHORT).show();
			
			break;
		case R.id.img01:
			Toast.makeText(MainActivity.this, "Clicou no 2",Toast.LENGTH_SHORT).show();
			
			break;
		case R.id.img02:
			Toast.makeText(MainActivity.this, "Clicou no 3",Toast.LENGTH_SHORT).show();
			
			break;
		case R.id.img10:
			Toast.makeText(MainActivity.this, "Clicou no 4",Toast.LENGTH_SHORT).show();
			
			break;
		case R.id.img11:
			Toast.makeText(MainActivity.this, "Clicou no 5",Toast.LENGTH_SHORT).show();
			
			break;
		case R.id.img12:
			Toast.makeText(MainActivity.this, "Clicou no 6",Toast.LENGTH_SHORT).show();
			
			break;
			

		default:
			break;
		}
    }
    
    
}
