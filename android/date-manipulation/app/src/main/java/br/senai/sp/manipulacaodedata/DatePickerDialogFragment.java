package br.senai.sp.manipulacaodedata;

import android.app.DatePickerDialog;
import android.app.DatePickerDialog.OnDateSetListener;
import android.app.Dialog;
import android.os.Bundle;


public class DatePickerDialogFragment{
    @Override
    public Dialog onCreateDialog(Bundle savedInstanceState) {
        Bundle args = getArguments();
        OnDateSetListener listener = (OnDateSetListener) getFragmentManager()
                .findFragmentByTag(
                        ReminderEditFragment.DEFAULT_EDIT_FRAGMENT_TAG);

        return new DatePickerDialog(getActivity(), listener,
                args.getInt(ReminderEditFragment.YEAR),
                args.getInt(ReminderEditFragment.MONTH),
                args.getInt(ReminderEditFragment.DAY));
    }




}