package br.senai.sp.myapplication;

import android.app.DatePickerDialog;
import android.app.DialogFragment;
import android.app.FragmentTransaction;
import android.app.TimePickerDialog;
import android.support.v4.app.Fragment;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.TimePicker;

import java.text.SimpleDateFormat;
import java.util.Calendar;


public class ReminderEditFragment extends Fragment implements
        DatePickerDialog.OnDateSetListener, TimePickerDialog.OnTimeSetListener {

    private static final String DATE_FORNAT = "yyyy-MM-dd";
    private static final String TIME_FORMAT = "kk:mm";
    private static final  R;

    private Calendar mCalendar;

    @Override
    public void onDateSet(DatePicker view, int year, int monthOfYear,
                          int dayOfMonth) {
        mCalendar.set(Calendar.YEAR, year);
        mCalendar.set(Calendar.MONTH, monthOfYear);
        mCalendar.set(Calendar.DAY_OF_MONTH, dayOfMonth);
        updateButtons();
    }

    @Override
    public void onTimeSet(TimePicker view, int hour, int minute) {
        mCalendar.set(Calendar.HOUR_OF_DAY, hour);
        mCalendar.set(Calendar.MINUTE, minute);
        updateButtons();
    }

    private void updateButtons() {
        // Define o texto do botão da hora
        SimpleDateFormat timeFormat = new SimpleDateFormat(TIME_FORMAT);
        String timeForButton = timeFormat.format(mCalendar.getTime());
        mTimeButton.setText(timeForButton);

        //Define o texto do botão da hora
        SimpleDateFormat dateFormat = new SimpleDateFormat(DATE_FORNAT);
        String dateForButton = dateFormat.format(mCalendar.getTime());
        mDateButton.setText(dateForButton);

    }



    private EditText mTitleText;
    private EditText mBodyText;
    private Button mDateButton;
    private Button mTimeButton;
    private Button mConfirmButton;


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

    View v = inflater.inflate(R.layout.reminder_edit, container,false);

    mTitleText = (EditText) v.findViewById(R.id.title);
    mBodyText = (EditText) v.findViewById(R.id.body);
    mDateButton = (Button) v.findViewById(R.id.reminder_date);
    mTimeButton = (Button) v.findViewById(R.id.reminder_time);
    mConfirmButton = (Button) v.findViewById(R.id.confirm);

        mDateButton.setOnClickListener(new View.onClickListener(){
            @Override
        public  void onClick(View v){
                showDatePicker();
            }
        });
        mTimeButton.setOnClickListener(new View.onClickListener(){
            @Override
            public  void onClick(View v){
                showTimePicker();
            }
        });
        return v;
    }

    static final String YEAR = "year";
    static final String MONTH = "month";
    static final String DAY = "day";
    static final String HOUR = "hour";
    static final String MINS = "mins";
    static final String CALENDAR = "calendar";

    private void showDatePicker(){
        FragmentTransaction ft = getFragmentManager().beginTransaction();
        DialogFragment newFragment = new DatePickerDialogFragment();
        Bundle args = new Bundle();
        args.putInt(YEAR, mCalendar.get(Calendar.YEAR));
        args.putInt(MONTH, mCalendar.get(Calendar.MONTH));
        args.putInt(DAY, mCalendar.get(Calendar.DAY_OF_MONTH));
        newFragment.setArguments(args);
        newFragment.show(ft, "datePicker");
    }

    private void showTimePicker(){
        FragmentTransaction ft = getFragmentManager().beginTransaction();
        DialogFragment newFragment = new TimePickerDialogFragment();
        Bundle args = new Bundle();
        args.putInt(HOUR, mCalendar.get(Calendar.HOUR_OF_DAY));
        args.putInt(MINS, mCalendar.get(Calendar.MINUTE));
        newFragment.setArguments(args);
        newFragment.show(ft, "timePicker");
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.reminder_edit);
        if (savedInstanceState.containsKey(CALENDAR)) {
            mCalendar = (Calendar) savedInstanceState.getSerializable(CALENDAR);
        }else
            mCalendar = Calendar.getInstance();


    }

    @Override
    public void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);

        //Salva a instancia do calendario no caso do usuario te-la alterado
        outState.putSerializable(CALENDAR, mCalendar);
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
