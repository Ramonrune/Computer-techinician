package br.senai.sp.manipulacaodedata;

import android.content.Intent;
import android.os.Bundle;


public class ReminderListActivity implements
        OnEditReminder {

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.reminder_list);
    }

    @Override
    public void editReminder(long id) {
        startActivity(new Intent(this, ReminderEditActivity.class).putExtra(
                ReminderProvider.COLUMN_ROWID, id));
    }
}
