# not a function file:
1;
pkg load signal
A = load ("-ascii", "ECG_Raw_data.dat");
B=dct(A);
C=mean(B);
M=mean(A)
