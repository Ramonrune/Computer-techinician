package com.example.gridlinhacodigo;

import android.app.Activity;
import android.graphics.Color;
import android.os.Bundle;
import android.view.Gravity;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.ViewGroup.LayoutParams;
import android.widget.GridLayout;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends Activity {
	LinearLayout ll;
	GridLayout gl;
	TextView[] text;
	int iItem;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
	    ll = new LinearLayout(MainActivity.this);
	    //primeira forma
	    ll.setLayoutParams(new LayoutParams(LayoutParams.MATCH_PARENT,LayoutParams.MATCH_PARENT));
		ll.setGravity(Gravity.CENTER);
		ll.setBackgroundResource(R.drawable.ironman);
		
		gl = new GridLayout(MainActivity.this);
		//2 forma 
		LinearLayout.LayoutParams wrapwrap = new LinearLayout.LayoutParams(LayoutParams.WRAP_CONTENT,LayoutParams.WRAP_CONTENT);
		gl.setLayoutParams(wrapwrap);
		//gl.setLayoutParams(new LayoutParams(LayoutParams.WRAP_CONTENT,LayoutParams.WRAP_CONTENT));
		gl.setBackgroundColor(Color.parseColor("#66FFFFFF"));
		gl.setColumnCount(3);
		gl.setRowCount(3);
		
		
		text = new TextView[9];
		for (int i = 0; i < text.length; i++) {
			text[i] = new TextView(MainActivity.this);
			text[i].setLayoutParams(wrapwrap);
			text[i].setText(String.valueOf(i));
			text[i].setTextSize(25);
			text[i].setPadding(50, 25, 10, 25);
			gl.addView(text[i]);
		}
		
		for (iItem = 0; iItem < text.length; iItem++) {
			text[iItem].setOnClickListener(new OnClickListener() {
				
				int iPos = iItem;
				
				@Override
				public void onClick(View v) {
					Toast.makeText(MainActivity.this, "Clicou na Posição "+iPos, Toast.LENGTH_LONG).show();
					
				}
			});
		}
		
		//grid layout dentro do linear layout
		ll.addView(gl);
		
		
		setContentView(ll);
	}

	
}
